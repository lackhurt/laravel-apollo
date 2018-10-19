# Laravel Apollo integration.

## Installation
Install the package via composer
```bash
composer require lackhurt/laravel-apollo
```

Add serviceProvider
```php
Lackhurt\Apollo\Providers\ApolloServiceProvider::class
```

Add facade
```php
'Apollo' => Lackhurt\Apollo\Facades\Apollo::class
```

Publish ServiceProvider
```php
php artisan vendor:publish --provider="Lackhurt\Apollo\Providers\ApolloServiceProvider"
```

Edit .env
```properties
APP_ID=your app id
CLUSTER=default
APOLLO_NAMESPACES="application, common_ns, others"
APOLLO_CONFIG_SERVER=http://apollometa:8090
```

Start agent as a daemon
```bash
php artisan apollo.start-agent
```

## License
laravel-apollo is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT).