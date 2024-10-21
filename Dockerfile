# Use PHP 8.1 FPM as base image
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install application dependencies
RUN composer install

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www

# Run the Artisan command to create the storage symlink
RUN php artisan storage:link

# Expose port 5000 and start php-fpm server
EXPOSE 5000
CMD ["php-fpm"]
