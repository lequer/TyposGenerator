<?php

/**
 * typos-generator
 * @author  michel <michel@mlequer.com> - https://mlequer.com
 * @license see LICENSE included in package
 * @version 1.0.0
 *
 **/

namespace MLequer\Component\Typos\Provider;

use PHPUnit\Framework\TestCase;

class DoubleCharTyposProviderTest extends TestCase
{

    /**
     * @covers \MLequer\Component\Typos\Provider\DoubleCharTyposProvider
     */
    public function testGenerateTypos(): void
    {
        $provider = new DoubleCharTyposProvider();
        $generator = $provider->generateTypos('computer');
        $res = iterator_to_array($generator, false);
        $this->assertEquals($this->expected, $res);
    }


    /**
     * @var array<string>
     */
    private array $expected = [
        'ccomputer',
        'coomputer',
        'commputer',
        'compputer',
        'compuuter',
        'computter',
        'computeer',
        'computerr',

    ];
}
