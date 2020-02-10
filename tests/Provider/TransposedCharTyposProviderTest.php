<?php

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

namespace MLequer\Component\Typos\Provider;

use PHPUnit\Framework\TestCase;

class TransposedCharTyposProviderTest extends TestCase
{
    /**
     * @covers \MLequer\Component\Typos\Provider\TransposedCharTyposProvider
     */
    public function testGenerateTypos(): void
    {
        $provider = new TransposedCharTyposProvider();
        $generator = $provider->generateTypos('decoded');
        $res = iterator_to_array($generator, false);
        $this->assertEquals($this->expected, $res);
    }


    /**
     * @var array<string>
     */
    private array $expected = [
        'edcoded',
        'dceoded',
        'deocded',
        'decdoed',
        'decoedd',
        'decodde',
    ];
}
