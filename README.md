# biblys/isbn

[![Build Status](https://travis-ci.org/biblys/isbn.svg?branch=master)](https://travis-ci.org/biblys/isbn)

This package can be used to:

- validate an ISBN code
- convert codes between ISBN-10, ISBN-13 and EAN (without hyphens) formats
- calculate the checksum digit
- show the registration agency (country or language)

## Installation

Install with composer:

```console
composer require biblys/isbn:^2.1.1
```

## Usage

Use case: converting an EAN (9782843449499) to an ISBN-13 (978-2-84344-949-9).

```php
<?php

use Biblys\Isbn\Isbn as Isbn;

$isbn = new Isbn('9782843449499');

try {
    $isbn->validate();
    $isbn13 = $isbn->format("ISBN-13");
    echo "ISBN-13: $isbn13";
} catch(Exception $e) {
    echo "An error occured while parsing $ean: ".$e->getMessage();
}
```

## Test

Run tests with PHPUnit:

```console
composer install
composer test
```

Run tests in a docker container:

```console
composer docker
```

## ISBN ranges update

New ISBN ranges may be added from time to time by the
[International ISBN Agency](https://www.isbn-international.org/). Whenever it
happens, this library must be updated. If a range update is necessary, please
open an issue on Github.
You can also open a pull request after updating the ranges your self with the
following commands:

```console
composer install
composer run update-ranges
```

## Changelog

### 2.1.1 (2019-07-17)

- Upgrade dependencies
- Upgrade PHPUnit to 8.3

### 2.1.0 (2019-04-18)

- Added a `validate` method that throws an Exception on ISBN validation errors
- Fixed [#9] Improve error output
- Added composer scripts to run tests and update ranges in a Docker container
- Updated ISBN ranges

### 2.0.8 (2019-02-07)

- Fixed [#7](https://github.com/biblys/isbn/issues/7): ISBNs with invalid product
  code or country code are considered valid
- Added PHP versions 7.1 & 7.2 to travis config file

### 2.0.7 (2019-02-01)

- Attempts to format an invalid ISBN will now throw an Exception
- Fixed considering ISBNs with an invalid product code as valid
- Updated ISBN ranges

### 2.0.6 (2017-11-22)

- Fixed [#6](https://github.com/biblys/isbn/issues/6): Error when validating
  ISBN-10 with X as a checksum digit

### 2.0.5 (2017-11-07)

- Update ISBN ranges

### 2.0.4 (2017-06-29)

- Fixed error when no rule is found (eg. for ISBN 9790706801940)

### 2.0.3 (2016-07-06)

- Added 978-99978 range for Mongolia

### 2.0.2 (2016-04-12)

- Fixed [#3](https://github.com/biblys/isbn/issues/3): Bug in the 978-613 range
- Added a composer script to update ISBN ranges from isbn-international.org

### 2.0.1 (2016-03-01)

- Fixed [#2](https://github.com/biblys/isbn/issues/2):
  added LICENSE file and copyright information
- Added Travis configuration file

### 2.0.0 (2016-03-01)

- Revamped library as a Composer package

### 1.1.0 (2015-08-21)

- Fixed [#1](https://github.com/biblys/isbn/issues/1):
  ISBN-10 checksum character calculation
- Added phpunit tests
- Updated ISBN XML ranges file

### 1.0.1 (2014-04-21)

- EAN-13 checksum character calculation bug fix

### 1.0.0 (2014-04-19)

- First release
