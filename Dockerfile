FROM dunglas/frankenphp:php8.2-bookworm

# 1. Install production dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Enable Production OPcache
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=2'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Install Node.js for Vite build
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 3. Copy dependencies first
COPY composer.json composer.lock package.json package-lock.json* ./
RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader
RUN npm install

# 4. Copy application and build
COPY . .
RUN npm run build

# 5. Final optimizations
RUN composer install --no-dev --no-interaction --optimize-autoloader
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Use FrankenPHP's default entrypoint (much faster than artisan serve)
ENV PORT=80
EXPOSE 80

# Production Start Command: Optimizes Laravel THEN starts the high-speed server
CMD php artisan config:cache && php artisan route:cache && php artisan view:cache && frankenphp php-server --listen :$PORT --root public/
