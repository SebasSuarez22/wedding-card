FROM php:8.2-apache

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

ENV PORT=80
EXPOSE 80

CMD ["sh", "-c", "sed -i \"s/Listen .*/Listen ${PORT}/\" /etc/apache2/ports.conf && sed -i \"s/:[0-9]*>/:${PORT}>/\" /etc/apache2/sites-available/000-default.conf && apache2-foreground"]
