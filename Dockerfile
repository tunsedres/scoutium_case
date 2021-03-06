FROM php:8.0-apache-buster
RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN a2enmod rewrite
