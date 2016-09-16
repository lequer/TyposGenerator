[![Build Status](https://travis-ci.org/lequer/TyposGenerator.svg?branch=master)](https://travis-ci.org/lequer/TyposGenerator)
# TyposGenerator

based on https://gist.github.com/lnolte/4135705

## Installation

Install the latest version with

`$ composer require mlequer/typos-generator`


## Usage

```php
// Single options
$options = ['transposedChars' => true];
$tg = new TypoGenerator($options);
$typos = $tg->generate('test')->getTypos();

// All options
$options = [
        'wrongKeys' => true,
        'missedChars' => true,
        'transposedChars' => true,
        'doubleChars' => true,
        'flipBits' => true,
        'generateHomophones' => true,
    ];
$tg = new TypoGenerator($options);
$typos = $tg->generate('test')->getTypos();

```
