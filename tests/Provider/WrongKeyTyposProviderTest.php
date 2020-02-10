<?php

/** @noinspection SpellCheckingInspection */

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

namespace MLequer\Component\Typos\Provider;

use PHPUnit\Framework\TestCase;

class WrongKeyTyposProviderTest extends TestCase
{

    /**
     * @covers \MLequer\Component\Typos\Provider\WrongKeyTyposProvider::generateTypos
     */
    public function testGenerateTypos(): void
    {
        $provider = new WrongKeyTyposProvider();
        $generator = $provider->generateTypos('computer');
        $res = iterator_to_array($generator, false);
        $this->assertEquals($this->expected, $res);
    }

    /**
     * @var array<string>
     */
    private array $expected = [
        'xomputer',
        'vomputer',
        'fomputer',
        'domputer',
        'cimputer',
        'ckmputer',
        'clmputer',
        'cpmputer',
        'c0mputer',
        'c9mputer',
        'conputer',
        'cokputer',
        'cojputer',
        'comouter',
        'comluter',
        'com-uter',
        'com0uter',
        'compyter',
        'comphter',
        'compjter',
        'compiter',
        'comp8ter',
        'comp7ter',
        'compurer',
        'compufer',
        'compuger',
        'compuyer',
        'compu6er',
        'compu5er',
        'computwr',
        'computsr',
        'computdr',
        'computrr',
        'comput4r',
        'comput3r',
        'computee',
        'computed',
        'computef',
        'computet',
        'compute5',
        'compute4',
    ];
}
