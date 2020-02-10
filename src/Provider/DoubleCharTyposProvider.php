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

class DoubleCharTyposProvider implements TyposProviderInterface
{
    /**
     * @inheritDoc
     */
    public function generateTypos(string $word): Generator
    {
        $length = strlen($word);
        for ($i = 0; $i < $length; ++$i) {
            $tempWord = substr($word, 0, $i + 1);
            $tempWord .= $word[$i];
            if ($i != ($length - 1)) {
                $tempWord .= substr($word, $i + 1);
            }
            yield $tempWord;
        }
    }
}
