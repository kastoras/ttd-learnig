FROM php:8-cli

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN apt-get -y update \
&& apt-get install -y libxml2-dev \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

RUN docker-php-ext-install soap

USER 1000