composer create-project laravel/laravel httpclient
composer require guzzlehttp/guzzle
composer require laravel/ui

php artisan serve
php artisan migrate
php artisan migrate:fresh

php artisan ui vue --auth

