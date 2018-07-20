# База Савватеева

База данных ссылок на выступления и ресурсы [Алексея Савватеева](https://ru.wikipedia.org/wiki/Савватеев,_Алексей_Владимирович).

Вертится здесь: http://savvateev.xyz/

Это версия на базе [Laravel](https://laravel.com).

## Системные требования

* PHP 7.1 (!) с модулями curl, mbstring
* [Composer](http://getcomposer.org)
* Sqlite3
* Make (необязательно --- см. Makefile)


## Для разработки:

```bash
git clone https://github.com/aeifn/savva2 && cd savva2
make erect
php artisan serve
```
