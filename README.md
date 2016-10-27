# phulp-dest

The dest addon for [PHULP](https://github.com/reisraff/phulp).

## Install

```bash
$ composer require reisraff/phulp-dest
```

## Usage

```php
<?php

use Phulp\Dest\Dest;

$phulp->task('dest', function ($phulp) {
    $phulp->src(['src/'], '/html$/')
        ->pipe(new Dest('path/'));
});

```
