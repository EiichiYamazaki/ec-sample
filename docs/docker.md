# Docker

## Setup

up
```
docker-compose up -b
```

php
```
docker exec -it ec-sample_php bash  
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate  
php artisan db:seed  
```

## アクセス

[local](http://localhost)

[phpmyadmin](http://localhost:8001)

[mail](http://localhost:8025)