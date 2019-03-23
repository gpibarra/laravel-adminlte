
## Laravel AdminLTE

Instalar con
```php
composer require gpibarra/laravel-adminlte --prefer-dist
```

Luego publicar las configuraciones, vistas y assets
```php
php artisan vendor:publish --provider="gpibarra\LaravelAdminLTE\LaravelAdminLTEServiceProvider"
```

Si ya se habia ejecutado "php artisan make:auth"
```php
php artisan vendor:publish --provider="gpibarra\LaravelAdminLTE\LaravelAdminLTEServiceProvider" --tag="views-default" --force
```

Si estas clonando tu propio repositorio y ya modificaste las vistas solo necesitas los assets
```php
php artisan vendor:publish --provider="gpibarra\LaravelAdminLTE\LaravelAdminLTEServiceProvider" --tag="public-adminlte"
php artisan vendor:publish --provider="gpibarra\LaravelAdminLTE\LaravelAdminLTEServiceProvider" --tag="public"
```
