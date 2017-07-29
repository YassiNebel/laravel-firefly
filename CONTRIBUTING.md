To contribute to this package:

Fork the project and submit a PR merging to master branch (pre 1.0)
For the PR to be merged, it needs to get an approval from at least 1 of the owners of the repo and should pass both Style CI & Travis CI tests

In case you need to test how the forum works in a target application you can create a dummy application by doing the following:

Setup a new Laravel project

```
laravel new laravel-firefly-test
```

Require the package
```
composer require bitporch/laravel-firefly:dev-master
```

Add the service provider to app/config.php

```
Bitporch\Firefly\FireflyServiceProvider::class,
```


Run the install command
```
php artisan firefly:install
```

Publish vendor files
```
php artisan vendor:publish
```
Also.. don't forget to migrate

php artisan migrate
Note: You'll need to add groups manually to the database table.

In case you need any help contributing you can create an issue on the repo or ping us (@dylan.dpc, @andreaselia, @riari) on larachat (https://larachat.co/)
