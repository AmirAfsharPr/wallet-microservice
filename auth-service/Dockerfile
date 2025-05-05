FROM php:8.2-fpm

# نصب اکستنشن‌های موردنیاز
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


# نصب Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تنظیم مسیر کار
WORKDIR /var/www

# کپی فایل‌های پروژه (فعلاً خالیه)
COPY . .

# نصب وابستگی‌ها (در آینده)
RUN composer install

# دسترسی به storage و cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache


EXPOSE 9000
CMD ["php-fpm"]
