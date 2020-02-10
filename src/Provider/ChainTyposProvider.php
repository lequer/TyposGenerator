<?php

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

namespace MLequer\Component\Typos\Provider;

use Generator;
use MLequer\Component\Typos\Generator\TyposGeneratorInterface;

class ChainTyposProvider implements TyposProviderInterface
{


    /**
     * @var TyposProviderCollection
     */
    private TyposProviderCollection $providerCollection;

    public function __construct(TyposProviderCollection $providerCollection)
    {
        $this->providerCollection = $providerCollection;
    }

    /**
     * @param TyposProviderInterface $provider
     * @return ChainTyposProvider
     */
    public function addProvider(TyposProviderInterface $provider): ChainTyposProvider
    {
        $this->providerCollection->addProvider($provider);
        return $this;
    }


    /**
     * @inheritDocvoid
     *
     * @return Generator
     */
    public function generateTypos(string $word): Generator
    {
        /** @var TyposGeneratorInterface $provider */
        foreach ($this->providerCollection as $provider) {
            yield from $provider->generateTypos($word);
        }
    }
}
