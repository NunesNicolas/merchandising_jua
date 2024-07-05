#!/bin/sh

php artisan config:clear
php artisan cache:clear
php artisan migrate --seed
php artisan config:cache

echo "Starting PHP-FPM and Nginx..."
service php8.2-fpm start
nginx -g "daemon off;"

exec "$@"