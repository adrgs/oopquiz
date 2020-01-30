FROM php:7.2.1-apache

COPY ./ /var/www/html/
COPY ./run-apache2.sh /usr/local/bin/run-apache2.sh

RUN chmod 777 /usr/local/bin/run-apache2.sh

CMD [ "/usr/local/bin/run-apache2.sh" ]