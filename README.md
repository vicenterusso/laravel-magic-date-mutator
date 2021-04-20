# Laravel Magic Date Mutator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vicenterusso/laravel-magic-date-mutator.svg?style=flat-square)](https://packagist.org/packages/vicenterusso/laravel-magic-date-mutator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/vicenterusso/laravel-magic-date-mutator/run-tests?label=tests)](https://github.com/vicenterusso/laravel_table_structure/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/vicenterusso/laravel-magic-date-mutator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/vicenterusso/laravel-magic-date-mutator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)

This package tries to auto convert date formats before mutator happens (if any). There is no need to specify what field is a date, it detects automatically from table.

## Installation

You can install the package via composer:

```bash
composer require vicenterusso/laravel-magic-date-mutator
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="VRusso\MagicDateMutator\MagicDateMutatorServiceProvider" --tag="laravel_magic_date_mutator-config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Database Format
    |--------------------------------------------------------------------------
    |
    | Desired format to convert any date field
    |
    */
    'database_format' => 'Y-m-d',
];
```

## Usage

Insert the following trait to any model, and you can retrieve all info about the table fields

```php
# Add trait to model
use \VRusso\MagicDateMutator\Traits\DateAutoMutator;
```

And that's it! When you set a value to a date type field, it tries to convert to a know format before any validation or cast happens

## Credits

- [Vicente Russo](https://github.com/vicenterusso)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
