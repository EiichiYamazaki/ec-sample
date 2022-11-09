# Docker
.envでアプリケーション名とIPを設定する

.envのアプリケーション名がそのままDB名になるので注意

Laravelの.env.exampleのDB名も同じ名前に変更する

## Setup

up
```
cp .env.local .env
docker-compose up -d
```

php
```
docker exec -it ec-sample_php bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
chown -R www-data:www-data /var/www/src/storage
```

## アクセス

[local](http://localhost)

[phpmyadmin](http://localhost:8001)

[mail](http://localhost:8025)