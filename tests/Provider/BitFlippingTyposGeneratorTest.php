<?php

/** @noinspection ALL */

/** @noinspection ALL */

/** @noinspection ALL */

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/


namespace MLequer\Component\Typos\Provider;


use PHPUnit\Framework\TestCase;

/**
 * Class BitFlippingTyposGeneratorTest
 *
 * @package MLequer\Component\Typos\Provider
 */
class BitFlippingTyposGeneratorTest extends TestCase
{


    /**
     * @covers \MLequer\Component\Typos\Provider\BitFlippingTyposGenerator
     */
    public function testGenerateTypos(): void
    {
        $provider  = new BitFlippingTyposGenerator();
        $generator = $provider->generateTypos('computer');
        $res       = iterator_to_array($generator, false);
          $this->assertEquals($this->expected, $res);
    }


    /**
     * @var array<string>
     */
    private array $expected = [
        'computer',
        'somputer',
        'komputer',
        'gomputer',
        'aomputer',
        'bomputer',
        'computer',
        'cgmputer',
        'ckmputer',
        'cmmputer',
        'cnmputer',
        'co-puter',
        'computer',
        'coeputer',
        'coiputer',
        'cooputer',
        'colputer',
        'com0uter',
        'computer',
        'comxuter',
        'comtuter',
        'comruter',
        'comquter',
        'comp5ter',
        'computer',
        'competer',
        'compqter',
        'compwter',
        'comptter',
        'compu4er',
        'computer',
        'compuder',
        'compuper',
        'compuver',
        'compuuer',
        'computer',
        'computur',
        'computmr',
        'computar',
        'computgr',
        'computdr',
        'compute2',
        'computer',
        'computeb',
        'computez',
        'computev',
        'computep',
        'computes',
    ];
}
