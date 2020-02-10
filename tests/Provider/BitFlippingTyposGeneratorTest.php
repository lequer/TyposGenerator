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

/******************************************************************************
 * @author  Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
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
        0  => 'computer',
        1  => 'somputer',
        2  => 'komputer',
        3  => 'gomputer',
        4  => 'aomputer',
        5  => 'bomputer',
        6  => 'computer',
        7  => 'cgmputer',
        8  => 'ckmputer',
        9  => 'cmmputer',
        10 => 'cnmputer',
        11 => 'co-puter',
        12 => 'computer',
        13 => 'coeputer',
        14 => 'coiputer',
        15 => 'cooputer',
        16 => 'colputer',
        17 => 'com0uter',
        18 => 'computer',
        19 => 'comxuter',
        20 => 'comtuter',
        21 => 'comruter',
        22 => 'comquter',
        23 => 'comp5ter',
        24 => 'computer',
        25 => 'competer',
        26 => 'compqter',
        27 => 'compwter',
        28 => 'comptter',
        29 => 'compu4er',
        30 => 'computer',
        31 => 'compuder',
        32 => 'compuper',
        33 => 'compuver',
        34 => 'compuuer',
        35 => 'computer',
        36 => 'computur',
        37 => 'computmr',
        38 => 'computar',
        39 => 'computgr',
        40 => 'computdr',
        41 => 'compute2',
        42 => 'computer',
        43 => 'computeb',
        44 => 'computez',
        45 => 'computev',
        46 => 'computep',
        47 => 'computes',
    ];
}
