FROM php:8.2-fpm

# Install dependencies
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


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

#RUN composer install

# Expose the port
EXPOSE 9000

CMD ["php-fpm"]
