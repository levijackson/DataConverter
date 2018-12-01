# DataConverter

Tool to convert data between different formats. Currently supported:
- CSV to Array
- CSV to JSON

## Getting Started
```
$transform = new \DataConverter\CsvToArray($csvFilePath);
$data = $transform->transform();
```


### Prerequisites
- PHP 7+

### Installing

```
composer require aerosox/dataconverter
```

## Tests

```
php vendor/bin/phpunit tests/
```
