# Laravel Vercel Installer

Install some files to run Laravel on Vercel.

## Requirements
- PHP >= 8.1
- Laravel >= 9.0

## Installation

```shell
composer require revolution/laravel-vercel-installer --dev

php artisan vercel:install
```

## TrustProxies.php
If you have any problems with TrustProxies, change $proxies.

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

## vercel.json

### regions
https://vercel.com/docs/concepts/edge-network/regions

### builds
`vercel-php@0.5.2` is PHP8.1

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

## LICENSE
MIT  
