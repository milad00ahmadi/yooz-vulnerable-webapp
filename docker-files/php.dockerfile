FROM php:7.4-fpm

WORKDIR /var/www/html

COPY ./src .

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN chown -R www-data:www-data *
