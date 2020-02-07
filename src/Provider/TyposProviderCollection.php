<?php

/**
 * Copyright (c) 2020. >Michel Le Quer michel@mlequer.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * php version 7.4
 */

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
     * @return void
     */
    public function addProvider(TyposProviderInterface $provider): void
    {
        $this->providers[] = $provider;
    }

    /**
     * @return ArrayIterator<int, TyposProviderInterface>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->providers);
    }
}
