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

namespace MLequer\Component\Typos\Generator;

use Generator;

/**
 * Interface TyposGeneratorInterface
 *
 * @package MLequer\Generator
 */
interface TyposGeneratorInterface
{
    /**
     * Return a generator with the typos for the word
     *
     * @param string $word The origin for the typos
     *
     * @return Generator<string> the typos as a generator
     */
    public function generateTypos(string $word): Generator;

    /**
     * @param string $word The origin for the typos
     * @return array<string> the typos in array
     */
    public function generateTyposAsArray(string $word): array;
}
