FROM php:8.2-fpm

# Install GD dan ekstensi lainnya
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip curl git \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Copy Composer dari image resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Laravel app akan dijalankan lewat Nginx -> php-fpm
CMD ["php-fpm"]
