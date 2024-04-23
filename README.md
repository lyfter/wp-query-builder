# Wp Query Builder
A package that allows you to create WP_Queries in a more elegant while offering you autocompletion in you IDE. Heavily inspired by Laravel Elequent and query builder.

Replace 
```
$query = new WP_Query([
    'posts_per_page' => 5,
    'post_type' => 'page'
]);

$query->get_posts();
```

With

```
WpQuery::build()
    ->type('page')
    ->limit(5)
    ->get();
```

## Installation
#### Install with composer
Run the following in your terminal to install the package with Composer.

```
$ composer require lyfter/wp-query-builder
```

The package uses [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading and can be used with the Composer's autoloader. Below is a basic example of getting started, though your setup may be different depending on how you are using Composer.

```php
require __DIR__ . '/vendor/autoload.php'; // Not required when using bedrock

use Lyfter\QueryBuilder\WpQuery;

$posts = WpQuery::build()
    ->type(['post', 'page'])
    ->limit(5)
    ->get();
```

See Composer's [basic usage](https://getcomposer.org/doc/01-basic-usage.md#autoloading) guide for details on working with Composer and autoloading.
basic usage guide for details on working with Composer and autoloading.
