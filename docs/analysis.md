# 静的解析

## PhpStan

```
docker exec -it ec-sample_php bash  
./vendor/bin/phpstan analyse
```

## php-cs-fixer

```
docker exec -it ec-sample_php bash
# 確認
./vendor/bin/php-cs-fixer fix -v --diff --dry-run --allow-risky=yes
# フォーマット
./vendor/bin/php-cs-fixer fix -v --diff --allow-risky=yes
```

