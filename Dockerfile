FROM php:7.2-apache

RUN docker-php-ext-install -j$(nproc) mysqli && \
    docker-php-ext-enable mysqli \

