#!/usr/bin/env bash
cd /var/www

### Check if a directory does not exist ###
if [ ! -d "/var/www/vendor" ]
then
    echo "Updating composer..."
    composer update --no-dev
    cp .env.docker .env
    php artisan key:generate
    php artisan db:seed --class=fillItems
fi

if [ ! -d "/var/www/node_modules" ]
then
    echo "Updating npm..."
    npm install
    npm run prod
fi

if [ ! -d "/var/www/public/pictures" ]
then
    mkdir -p public/pictures
    chmod 777 public/pictures
    echo "Pictures folder created!"
fi

cp public/pictures-seed/* public/pictures/

echo '-------------------------------------------------'
echo '                                                 '
echo '                                                 '
echo ' Application is running in http://localhost:8080 '
echo '                                                 '
echo '                                                 '
echo '-------------------------------------------------'

php artisan serve --host=0.0.0.0 --port=80
