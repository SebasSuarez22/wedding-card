FROM php:8.2-apache

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

ENV PORT=80
EXPOSE 80

CMD ["sh", "-c", "find /etc/apache2/mods-enabled -maxdepth 1 -name 'mpm_*' -delete && a2enmod mpm_prefork > /dev/null && sed -i \"s/Listen .*/Listen ${PORT}/\" /etc/apache2/ports.conf && sed -i \"s/:[0-9]*>/:${PORT}>/\" /etc/apache2/sites-available/000-default.conf && if [ -n \"$HOMEPAGE\" ]; then echo \"DirectoryIndex ${HOMEPAGE} index.php index.html\" > /etc/apache2/conf-enabled/zz-homepage.conf; fi && apache2-foreground"]
