# mogitate

## 環境構築
1. docker compose up -d --build
2. docker compose exec php bash
3. composer install
4. cp .env.example .env
5. php artisan make:controller
6. php artisan key:generete
7. php artisan make:model
8. php artisan make:migration
9. php artisan migrate
10. php artisan make:seeder
11. php artisan db:seed
12. php artisan vendor:publish --tag=laravel-pagination

## ER図
https://drive.google.com/file/d/1NMJpYPZrJbrO-hr9e-rJ-F1tcZVbGZlz/view?usp=sharing

## 使用技術
- PHP 7.4.9
- laravel *v8.83.8
- MySQL 15.1

## URL
- 環境開発：http://localhost/ptoducts
- phpMyadmin：http://localhost:8080/
