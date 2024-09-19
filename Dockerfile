# Dockerfile
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    git \
    curl \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql zip exif pcntl gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Install PHP dependencies
RUN composer install

# Expose the PHP-FPM port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
