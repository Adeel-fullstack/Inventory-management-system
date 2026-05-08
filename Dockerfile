FROM dunglas/frankenphp:php8.2-bookworm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js for Vite build
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# 1. Copy dependencies first for better caching
COPY composer.json composer.lock package.json package-lock.json* ./
RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader
RUN npm install

# 2. Copy the rest of the application
COPY . .

# 3. Build assets (Requires resources folder which is now present)
RUN npm run build

# 4. Final PHP optimizations
RUN composer install --no-dev --no-interaction --optimize-autoloader
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Expose the port Railway assigns
EXPOSE ${PORT:-80}

# Start the server
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-80}
