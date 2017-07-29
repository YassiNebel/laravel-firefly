## Laravel Forum

[![Build Status](https://travis-ci.org/bitporch/laravel-forum.svg?branch=master)](https://travis-ci.org/bitporch/laravel-forum)
[![Total Downloads](https://poser.pugx.org/bitporch/laravel-forum/downloads)](https://packagist.org/packages/bitporch/laravel-forum)
[![License](https://poser.pugx.org/bitporch/laravel-forum/license)](https://packagist.org/packages/bitporch/laravel-forum)

This package allows you to easily add a simple forum to your application whilst also supporting ease of use and expansion.

## Features

+ Very flexible usage, very easy to expand upon

## Installation

Install the package directly from the command line using the following command.

```bash
composer require "bitporch/laravel-forum"
```

Next open up `config/app.php` and add the following under the package providers section.

```php
Bitporch\Forum\ForumServiceProvider::class,
```

Then go ahead and run our easy to use install command.

```bash
php artisan forum:install
```

Finally you need to register the policies inside of the `AuthServiceProvider`.

```php
'Bitporch\Forum\Models\Discussion' => 'App\Policies\DiscussionPolicy',
'Bitporch\Forum\Models\Group'      => 'App\Policies\GroupPolicy',
'Bitporch\Forum\Models\Post'       => 'App\Policies\PostPolicy',
```

## Migrations
Setup your database in your `.env` file and run the migrations.

```bash
php artisan migrate
```

## Assets

Run the following command to publish the migrations and config file.

```bash
php artisan vendor:publish --provider="Bitporch\Forum\ForumServiceProvider"
```

## Traits

Next up you'll need to add the `ForumUser` trait to your `User` model.

```php
<?php

namespace App;

use Bitporch\Forum\Traits\ForumUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ForumUser;
}
```

## Configuration

After publishing, the forum config file can be found under `config/forum.php` where you can modify the package configuration.
