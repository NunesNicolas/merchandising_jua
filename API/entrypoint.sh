#!/bin/sh

php artisan config:clear
php artisan cache:clear
php artisan migrate
php artisan config:cache

exec "$@"
