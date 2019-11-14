FROM php:5.6-apache

        RUN apt-get update && \
            apt-get install -y libfreetype6-dev libjpeg62-turbo-dev && \
            docker-php-ext-install mysql && \
            docker-php-ext-install mysqli && \
            docker-php-ext-install pdo && \
            docker-php-ext-install pdo_mysql && \
            docker-php-ext-install mbstring && \
            docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  &&  \
            docker-php-ext-install gd
