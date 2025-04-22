# mogitate

## 環境構築
1. docker compose up -d --build
2. docker compose exec php bash
3. composer install
4. env.exampleファイルから.envを作成し、環境変数を変更
5. php artisan key:generete
6. php artisan migrate
7. php artisan db:seed

## 使用技術
- PHP 7.4.9
- laravel *v8.83.8
- MySQL 15.1

## URL
- 環境開発：http://localhost
- phpMyadmin：http://localhost:8080/
