# Dockerfile برای transaction-service
FROM php:8.2-fpm

# نصب Composer
RUN apt-get update && apt-get install -y \
    software-properties-common \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# تنظیمات کاری لاراول
WORKDIR /var/www
COPY . .

# نصب وابستگی‌ها
#RUN composer install

# تنظیم مالکیت فایل‌ها
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
