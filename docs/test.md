# test

## Setup
testテーブルを作成

```
docker exec -it ec-sample_php bash
php artisan migrate --env=testing
```

## 実行
```
docker exec -it ec-sample_php bash
php artisan test
```
