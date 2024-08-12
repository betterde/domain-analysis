# 使用说明

## 直接使用 PHP CLI 启动

```shell
php -S localhost:8080 yuming.php
```

## 使用 Docker 启动

```shell
docker run --rm --name domain-demo -p 8080:8080 -v $(pwd):/var/www/html php:cli php -S 0.0.0.0:8080 /var/www/html/yuming.php
```

访问 http://localhost:8080