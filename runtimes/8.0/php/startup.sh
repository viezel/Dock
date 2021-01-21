#!/bin/bash

set -e

# disable opcache
sed -i -e "s/opcache.enable=1/opcache.enable=0/" /etc/php/8.0/fpm/php.ini

php-fpm8.0
