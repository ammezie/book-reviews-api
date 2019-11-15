# book-reviews-api

Book reviews API

clone the REPO

cp .env.example .env

add database variables in .env

composer install

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

php artisan jwt:secret

php artisan migrate

php artisan serve

php artisan route:list to view all applicable routes and their methods