FROM php:7.2.1-apache

COPY ./ /var/www/html/

ENTRYPOINT []
CMD sed -i -e "s/Listen 80/Listen 8080/g" /etc/apache2/ports.conf && apache2-foreground
