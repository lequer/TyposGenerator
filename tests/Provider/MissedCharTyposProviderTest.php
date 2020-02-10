<?php

/** @noinspection ALL */

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/


namespace MLequer\Component\Typos\Provider;

use PHPUnit\Framework\TestCase;

class MissedCharTyposProviderTest extends TestCase
{


    /**
     * @covers \MLequer\Component\Typos\Provider\MissedCharTyposProvider
     */
    public function testGenerateTypos(): void
    {
        $provider  = new MissedCharTyposProvider();
        $generator = $provider->generateTypos('computer');
        $res       = iterator_to_array($generator, false);
        $this->assertEquals($this->expected, $res);
    }

    /**
     * @var array<string>
     */
    private array $expected = [
        "omputer",
        "cmputer",
        "coputer",
        "comuter",
        "compter",
        "compuer",
        "computr",
        "compute",
    ];
}
