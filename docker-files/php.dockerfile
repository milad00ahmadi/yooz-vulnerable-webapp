FROM php:7.4-fpm

WORKDIR /var/www/html

COPY ./backend .

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

VOLUME [ "/var/www/html/cache" ]

RUN chown -R www-data:www-data *

