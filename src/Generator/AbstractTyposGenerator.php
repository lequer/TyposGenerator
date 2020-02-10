<?php

namespace MLequer\Component\Typos\Generator;

use MLequer\Component\Typos\Provider\TyposProviderInterface;

abstract class AbstractTyposGenerator implements TyposGeneratorInterface
{
    /**
     * @var TyposProviderInterface
     */
    protected TyposProviderInterface $typoProvider;

    public function __construct(TyposProviderInterface $typoProvider)
    {
        $this->typoProvider = $typoProvider;
    }
}
