[![pipeline status](https://gitlab.com/mlequer-component/typos/typosgenerator/badges/master/pipeline.svg)](https://gitlab.com/mlequer-component/typos/typosgenerator/-/commits/master)
[![coverage report](https://gitlab.com/mlequer-component/typos/typosgenerator/badges/master/coverage.svg)](https://gitlab.com/mlequer-component/typos/typosgenerator/-/commits/master)

# Typos generator utility

## Installation

Install the latest version with

`$ composer require mlequer/typos-generator`


## Usage

```php
// if needed
// require "vendor/autoload.php"; 

use MLequer\Component\Typos\Generator\TypoGenerator;
use MLequer\Component\Typos\Provider\ChainTyposProvider;
use MLequer\Component\Typos\Provider\HomophoneTyposProvider;
use MLequer\Component\Typos\Provider\TyposProviderCollection;


$typos = new HomophoneTyposProvider();
// usage without chain:
$g =  new TypoGenerator($typos);
$res = $g->generateTypos("computer"); // return a Generator
$res = $g->generateTyposAsArray("something"); // return an array

// using multiple typos providers
$typos = new HomophoneTyposProvider();
$collection = new TyposProviderCollection();

$collection->addProvider($typos)
//          ->addProvider(new WrongKeyTyposProvider)
//          ->addProvider( ... )
// ...
;
// use the special chain provider
$chain = new ChainTyposProvider($collection);
$g =  new TypoGenerator($typos);
// return a Generator

$res = $g->generateTypos("computer");
foreach ($res as $t) {
    echo $t . "\n";
}

// return an array
$res = $g->generateTyposAsArray("something");
var_dump($res);

```

You can create your own provider by extending `TyposProviderInterface`