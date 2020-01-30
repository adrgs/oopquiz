FROM php:7.2.1-apache

COPY ./ /var/www/html/

RUN chmod 777 /var/www/html/script.sh

CMD ["/var/www/html/script-sh"]

#RUN /usr/local/bin/docker-entrypoint.sh apache2-foreground