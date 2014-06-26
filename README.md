Laravel Luhn Validator
=================

A [luhn algorithm](http://en.wikipedia.org/wiki/Luhn_algorithm) validator for Laravel 4's Validator.

## Installation

Start by adding this package to your `composer.json`:

```json
"require-dev": {
    "hipsterjazzbo/laravel-luhn-validator": "1.*"
}
```

Now you've got to update composer:

```bash
composer update
```

And then add this package to the `ServiceProviders` array in your `app/config/app.php`:

```php
'HipsterJazzbo\LaravelLuhnValidator\LaravelLuhnValidatorServiceProvider'
```

## Usage

Just specify the new rule when you're defining your rules:

```php
$rules = [
    'card_number' => [
        'required',
        'luhn'
    ]
];
```

[Learn more about Laravel validation](http://laravel.com/docs/validation)
