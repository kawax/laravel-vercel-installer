# Laravel Vercel Installer

[![Maintainability](https://api.codeclimate.com/v1/badges/9b0a78d5e14c3c85fe4f/maintainability)](https://codeclimate.com/github/kawax/laravel-vercel-installer/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/9b0a78d5e14c3c85fe4f/test_coverage)](https://codeclimate.com/github/kawax/laravel-vercel-installer/test_coverage)

Install some files to run Laravel on Vercel.

## Requirements
- PHP >= 8.1
- Laravel >= 9.0

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
`vercel-php@0.6.0` is PHP8.2

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

## Livewire
To use livewire, you must publish a config file

```shell
php artisan livewire:publish --config
```

Change `manifest_path` in config/livewire.php.

```php
    'manifest_path' => env('LIVEWIRE_MANIFEST_PATH'),
```

## LICENSE
MIT  
