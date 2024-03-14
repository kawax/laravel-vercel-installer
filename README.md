# Laravel Vercel Installer

[![Maintainability](https://api.codeclimate.com/v1/badges/9b0a78d5e14c3c85fe4f/maintainability)](https://codeclimate.com/github/kawax/laravel-vercel-installer/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/9b0a78d5e14c3c85fe4f/test_coverage)](https://codeclimate.com/github/kawax/laravel-vercel-installer/test_coverage)

Install some files to run Laravel on Vercel.

## Requirements
- PHP >= 8.2
- Laravel >= 10.0

## Installation

```shell
composer require revolution/laravel-vercel-installer --dev

php artisan vercel:install
```

## vercel.json
It will probably not work with the new spec that uses `functions` and `rewrites` in vercel.json.

### regions
https://vercel.com/docs/concepts/edge-network/regions

### builds
`vercel-php@0.7.0` is PHP8.3

To use another version, check this repository.
https://github.com/vercel-community/php

### routes
If there are other files in public, add them to routes.

```json
    {
        "src": "/images/(.*)",
        "dest": "/public/images/$1"
    },
```

### env
Secret env is set in the vercel settings page.

## TrustProxies

### Laravel 10
If you have any problems with TrustProxies, change `/app/Http/Middleware/TrustProxies.php`.

```php
class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies = '*';

```

### Laravel 11
Change `/bootstrap/app.php`
```php
->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
    })
```

## LICENSE
MIT  
