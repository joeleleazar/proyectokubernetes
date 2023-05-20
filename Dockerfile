FROM php:7.4-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY . /var/www/html
RUN a2enmod rewrite
ENV MYSQL_ROOT_PASSWORD=root
RUN apt-get update
EXPOSE 80

CMD ["apache2-foreground"]