# FROM wyveo/nginx-php-fpm:latest
FROM php:7.4-fpm-alpine3.12
LABEL MAINTAINER="webdantas <webdantas@gmail.com>"
LABEL PHP="7.4"
LABEL BASE_FRAMEWORK="Laravel 8"
WORKDIR /var/www/laravel8/
RUN rm -rf /var/www/laravel8/html
COPY . /var/www/laravel8/
RUN chmod -R 775 /var/www/laravel8/storage/*
RUN ln -s public html
