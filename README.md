# Casthacker - Podcast App

## Installation
Make sure you have environment setup properly. You will need MySQL 5.7+, PHP 8.2 - 8.3, Node.js and composer.

1. Download the project (or clone using GIT)
2. Copy .env.example into .env and configure database credentials
3. Navigate to the project's root directory using terminal
4. Run `composer install`
5. Set the encryption key by executing `php artisan key:generate`
6. Run migrations  `php artisan migrate --seed`
7. Create a symbolic link  from `public/storage` to `storage/app/public` by executing the following command `php artisan storage:link`
8. Run `npm install`
9. Run `npm run dev` to start vite server for Laravel frontend
10. Run `php artisan serve` to start Laravel's local development server
