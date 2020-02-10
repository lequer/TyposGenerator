<?php

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

namespace MLequer\Component\Typos\Generator;

use Generator;

/**
 * TypoGenerator Class.
 *
 * A utility class that generate typos based on providers
 *
 * @author "Michel Le Quer <michel@mlequer.com>"
 * @since  0.1
 * */
class TypoGenerator extends AbstractTyposGenerator
{

    /**
     * Generate typos an return a generator
     *
     * @param string $word the base word
     * @return Generator<string> A generator that can be used with 'foreach'
     */
    public function generateTypos($word): Generator
    {
        yield from $this->typoProvider->generateTypos($word);
    }

    /**
     * Generate typos and return an array.
     *
     * @param string $word
     * @return array<string>
     */
    public function generateTyposAsArray(string $word): array
    {
        return iterator_to_array($this->generateTypos($word), false);
    }
}
