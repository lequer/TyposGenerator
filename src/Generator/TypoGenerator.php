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
