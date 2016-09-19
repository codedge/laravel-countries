# Lumen Countries

[![StyleCI](https://styleci.io/repos/68582372/shield)](https://styleci.io/repos/68582372)
[![Latest Stable Version](https://poser.pugx.org/codedge/lumen-countries/v/stable?format=flat-square)](https://packagist.org/packages/codedge/lumen-countries)
[![Total Downloads](https://poser.pugx.org/codedge/lumen-countries/downloads?format=flat-square)](https://packagist.org/packages/codedge/lumen-countries)
[![License](https://poser.pugx.org/codedge/lumen-countries/license?format=flat-square)](https://packagist.org/packages/codedge/lumen-countries)


Lumen Countries is a bundle for Lumen, providing ISO 3166_2, 3166_3, currency, capital and more for all countries. It is based on Laravel-Countries made by [webpatser](https://github.com/webpatser/laravel-countries) (Christoph Kempen).

## Installation

Install the package running:  
```php
$ composer require codedge/lumen-countries
```

Edit `bootstrap/app.php` and add the Service Provider `[1]` 

```php
/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
...    

*/

$app->register(Codedge\Countries\CountriesServiceProvider::class); // [1]
``` 

and Facade/Alias `[2]`

```php
$app->withFacades();

class_alias(Codedge\Countries\CountriesFacade::class, 'Countries'); // [2]
```

Also register the `vendor:publish` command in your `app/Console/Kernel.php`

```php
/**
 * The Artisan commands provided by your application.
 *
 * @var array
 */
protected $commands = [
    // ...
    BasicIT\LumenVendorPublish\VendorPublishCommand::class
];
```


## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `countries` suits you, leave it. Otherwise run the following command

```bash
$ php artisan vendor:publish --provider="Codedge\Countries\CountriesServiceProvider"
```

Next generate the migration file:

```bash
$ php artisan countries:migration
``
    
It will generate the `<timestamp>_setup_countries_table.php` migration and the `CountriesSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the countries
    $this->call('CountriesSeeder');
    $this->command->info('Seeded the countries!'); 

You may now run it with the artisan migrate command:

```bash
$ php artisan migrate --seed
```
    
After running this command the filled countries table will be available.