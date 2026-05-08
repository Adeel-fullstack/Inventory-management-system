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

# Copy composer files and install PHP dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader

# Copy package files and build frontend
COPY package.json package-lock.json* ./
RUN npm install && npm run build || true

# Copy the rest of the application
COPY . .

# Re-run composer to execute post-install scripts
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Create required directories and set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# DO NOT cache config here — DB variables are not available at build time
# Only cache views (no DB needed)
RUN php artisan view:cache || true

# Expose the port Railway assigns
EXPOSE ${PORT:-80}

# Start the server WITHOUT auto-migration
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-80}
