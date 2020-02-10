<?php

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

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - http:s//mlequer.com          *
 * @version 2.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

namespace MLequer\Component\Typos\Provider;

use ArrayIterator;
use IteratorAggregate;

/**
 * Class TyposProviderCollection
 * @package MLequer\Component\Typos\Provider
 *
 * @implements \IteratorAggregate<TyposProviderInterface>
 */
class TyposProviderCollection implements IteratorAggregate
{

    /**
     * @var array<TyposProviderInterface>
     */
    private $providers = [];

    /**
     * @param TyposProviderInterface $provider Add a typos provider to the collection
     * @return TyposProviderCollection
     */
    public function addProvider(TyposProviderInterface $provider): TyposProviderCollection
    {
        $this->providers[] = $provider;
        return $this;
    }

    /**
     * @return ArrayIterator<int, TyposProviderInterface>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->providers);
    }
}
