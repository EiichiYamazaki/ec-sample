## Setup

### Docker

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

### アクセス

[local](http://localhost)

[phpmyadmin](http://localhost:8001)

## test

### Setup
testテーブルを作成

```
docker exec -it ec-sample_php bash
php artisan migrate --env=testing
```

### 実行
```
docker exec -it ec-sample_php bash
php artisan test
```
