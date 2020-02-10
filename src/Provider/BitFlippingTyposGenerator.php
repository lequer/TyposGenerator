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

/** @noinspection ALL */

namespace MLequer\Component\Typos\Provider;

use Generator;

/**
 * Class BitFlippingTyposGenerator
 *
 * @package MLequer\Generator
 */
class BitFlippingTyposGenerator implements TyposProviderInterface
{
    /**
     * @inheritDoc
     *
     *
     */
    public function generateTypos(string $word): Generator
    {
        $masks = [128, 64, 32, 16, 8, 4, 2, 1];
        $allowedChars = '/[a-zA-Z0-9_\-\.]/';
        $typos = [];

        $filter = function ($string) use ($allowedChars) {
            return preg_match($allowedChars, $string);
        };
        foreach (str_split($word) as $i => $char) {
            $mapped = function ($mask) use ($char) {
                return strtolower(chr(ord($char) ^ $mask));
            };
            $flipped = array_filter(array_map($mapped, $masks), $filter);
            $typos[] = array_map(
                function ($char) use ($i, $word) {
                    return substr_replace($word, $char, $i, 1);
                },
                $flipped
            );
        }

        $return = array();
        array_walk_recursive(
            $typos,
            function ($val) use (&$return) {
                $return[] = $val;
            }
        );

        yield from $return;
    }
}
