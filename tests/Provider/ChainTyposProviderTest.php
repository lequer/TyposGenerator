<?php

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

namespace MLequer\Component\Typos\Provider;

use PHPUnit\Framework\TestCase;

class ChainTyposProviderTest extends TestCase
{
    /**
     * @covers \MLequer\Component\Typos\Provider\ChainTyposProvider::__construct
     * @covers \MLequer\Component\Typos\Provider\ChainTyposProvider::generateTypos
     * @uses   \MLequer\Component\Typos\Provider\DoubleCharTyposProvider::generateTypos
     * @uses   \MLequer\Component\Typos\Provider\MissedCharTyposProvider::generateTypos
     * @uses   \MLequer\Component\Typos\Provider\TyposProviderCollection::addProvider
     * @uses   \MLequer\Component\Typos\Provider\TyposProviderCollection::getIterator
     */
    public function testGenerateTypos(): void
    {
        $provider = new ChainTyposProvider($this->getCollection());
        $res = iterator_to_array($provider->generateTypos('computer'), false);
        $this->assertEquals($this->expected, $res);
    }

    /**
     * @covers \MLequer\Component\Typos\Provider\ChainTyposProvider::addProvider
     * @uses   \MLequer\Component\Typos\Provider\ChainTyposProvider::generateTypos()
     * @uses   \MLequer\Component\Typos\Provider\ChainTyposProvider::__construct
     * @uses   \MLequer\Component\Typos\Provider\DoubleCharTyposProvider::generateTypos
     * @uses   \MLequer\Component\Typos\Provider\MissedCharTyposProvider::generateTypos
     * @uses   \MLequer\Component\Typos\Provider\TyposProviderCollection::addProvider
     * @uses   \MLequer\Component\Typos\Provider\TyposProviderCollection::getIterator
     */
    public function testAddProvider(): void
    {
        $provider = new ChainTyposProvider(new TyposProviderCollection());
        $provider->addProvider(new DoubleCharTyposProvider())
            ->addProvider(new MissedCharTyposProvider());
        $res = iterator_to_array($provider->generateTypos('computer'), false);
        $this->assertEquals($this->expected, $res);
    }


    private function getCollection(): TyposProviderCollection
    {
        $collection = new TyposProviderCollection();
        $doubleCharTypos = new DoubleCharTyposProvider();
        $missedCharTypos = new MissedCharTyposProvider();
        $collection->addProvider($doubleCharTypos)
            ->addProvider($missedCharTypos);

        return $collection;
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
