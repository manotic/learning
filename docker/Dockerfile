FROM php:8.3.12-fpm

WORKDIR /var/www/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo_mysql

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \