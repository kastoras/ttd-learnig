FROM php:8.0-apache

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install -y && \
    apt-get install -y curl  && \
    apt-get install -y sendmail  && \
    apt-get install -y build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev  && \
    apt-get install -y libicu-dev

COPY conf/sharedmodules.conf /etc/apache2/sites-enabled/sharedmodules.conf

RUN apt-get update -y \
    && apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libldap2-dev \
    libxml2-dev \
    libzip-dev \
    default-mysql-client \
    unzip \
    && apt-get autoremove -y \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) calendar intl mysqli pdo pdo_mysql gd soap zip \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install -j$(nproc) ldap

RUN mv ${PHP_INI_DIR}/php.ini-production ${PHP_INI_DIR}/php.ini

RUN echo "sendmail_path=/usr/sbin/sendmail -t -i" >> /usr/local/etc/php/conf.d/sendmail.ini

RUN sed -i '/#!\/bin\/sh/aservice sendmail restart' /usr/local/bin/docker-php-entrypoint

RUN sed -i '/#!\/bin\/sh/aecho "$(hostname -i)\t$(hostname) $(hostname).localhost" >> /etc/hosts' /usr/local/bin/docker-php-entrypoint

RUN a2enmod rewrite

COPY ./src/composer.json ./composer.json

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer update

COPY ./src .

RUN chmod 777 -R /var/www/html/writable
RUN chmod 777 -R /var/www/html/vendor
#RUN chown -R www-data:www-data /var/www/html/vendor

EXPOSE 80

CMD ["apache2-foreground"]