<?php

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

namespace MLequer\Component\Typos\Provider;

use PHPUnit\Framework\TestCase;

class TyposProviderCollectionTest extends TestCase
{

    /**
     * @covers \MLequer\Component\Typos\Provider\TyposProviderCollection::addProvider
     * @covers \MLequer\Component\Typos\Provider\TyposProviderCollection::getIterator
     */
    public function testAddProviderAndGetIterator(): void
    {
        $collection = new TyposProviderCollection();
        $doubleCharTypos = new DoubleCharTyposProvider();
        $missedCharTypos = new MissedCharTyposProvider();
        $collection->addProvider($doubleCharTypos)
            ->addProvider($missedCharTypos);

        /** @var TyposProviderInterface $generator */
        foreach ($collection as $generator) {
            $this->assertInstanceOf(TyposProviderInterface::class, $generator);
        }
    }
}
