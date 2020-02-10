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

use Generator;

class TransposedCharTyposProvider implements TyposProviderInterface
{
    /**
     * @inheritDoc
     *
     */
    public function generateTypos(string $word): Generator
    {
        $length = strlen($word);
        foreach (str_split($word) as $i => $char) {
            if ($i + 1 == $length) {
                break;
            }
            $tempWord = $word;
            $tempWord = substr_replace($tempWord, $tempWord[$i + 1], $i, 1);
            $tempWord = substr_replace($tempWord, $char, $i + 1, 1);
            yield $tempWord;
        }
    }
}
