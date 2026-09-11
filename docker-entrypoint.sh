#!/bin/sh
set -e

find /etc/apache2/mods-enabled -maxdepth 1 -name 'mpm_*' -delete
a2enmod mpm_prefork > /dev/null

sed -i "s/Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:[0-9]*>/:${PORT}>/" /etc/apache2/sites-available/000-default.conf

if [ -n "$HOMEPAGE" ]; then
    sed -i "s#</VirtualHost>#    RewriteEngine On\n    RewriteRule ^/\$ /${HOMEPAGE} [L]\n</VirtualHost>#" /etc/apache2/sites-available/000-default.conf
fi

exec apache2-foreground
