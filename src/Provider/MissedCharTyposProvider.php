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

class MissedCharTyposProvider implements TyposProviderInterface
{

    /**
     * @param  string $word
     * @return Generator<string>
     */
    public function generateTypos(string $word): Generator
    {
        $length = strlen($word);
        for ($i = 0; $i < $length; ++$i) {
            if ($i == 0) {
                yield substr($word, $i + 1);
                continue;
            }
            if (($i + 1) == $length) {
                yield substr($word, 0, $i);
                continue;
            }
            $tempWord = substr($word, 0, $i);
            $tempWord .= substr($word, $i + 1);

            yield $tempWord;
        }
    }
}
