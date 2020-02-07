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
 */

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
