# Lumen Countries

Lumen Countries is a bundle for Lumen, providing ISO 3166_2, 3166_3, currency, capital and more for all countries. It is based on Laravel-Countries made by [webpatser](https://github.com/webpatser/laravel-countries) (Christoph Kempen).

**Please note that version 1.4 is Laravel 5 only, older versions of Laravel should use version 1.3.4 instead**

## Installation

Add `webpatser/laravel-countries` to `composer.json`.

    "webpatser/laravel-countries": "dev-master"
    
Run `composer update` to pull down the latest version of Country List.

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => [
        'Webpatser\Countries\CountriesServiceProvider',
    ]

Now add the alias.

    'aliases' => [
        'Countries' => 'Webpatser\Countries\CountriesFacade',
    ]
    

## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `countries` suits you, leave it. Otherwise run the following command

    $ php artisan vendor:publish

Next generate the migration file:

    $ php artisan countries:migration
    
It will generate the `<timestamp>_setup_countries_table.php` migration and the `CountriesSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the countries
    $this->call('CountriesSeeder');
    $this->command->info('Seeded the countries!'); 

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed
    
After running this command the filled countries table will be available