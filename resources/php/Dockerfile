FROM php:7.2-apache

#Instalacion DB2
ADD resources/php/clidriver.tar.gz /
RUN yes '/clidriver' | pecl install -f ibm_db2 && docker-php-ext-enable ibm_db2
RUN a2enmod rewrite && service apache2 restart
