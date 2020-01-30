FROM php:7.2.1-apache

COPY ./ /var/www/html/

RUN sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf
RUN /usr/local/bin/docker-entrypoint.sh apache2-foreground