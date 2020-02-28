FROM php:5.5-apache
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql mysql mysqli

RUN a2enmod rewrite

COPY . /var/www/html/