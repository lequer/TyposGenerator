<?php

/******************************************************************************
 * @author Michel Le Quer <michel@mlequer.com> - https://mlequer.com          *
 * @version 1.0.0                                                             *
 * @license see LICENSE included in package                                   *
 *                                                                            *
 ******************************************************************************/

namespace MLequer\Component\Typos\Generator;

use MLequer\Component\Typos\Provider\TyposProviderInterface;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \MLequer\Component\Typos\Generator\TypoGenerator
 */
class TypoGeneratorTest extends TestCase
{

    /**
     * @var array<string>
     */
    private array $expected = [
        'test1',
        'test2',
    ];

    /**
     * @var TypoGenerator
     */
    private TypoGenerator $generator;


    protected function setUp(): void
    {
        $this->generator = new TypoGenerator($this->getMockProvider());
    }


    /**
     * @covers   \MLequer\Component\Typos\Generator\AbstractTyposGenerator::__construct
     * @covers ::generateTypos
     */
    public function testTyposAsGenerator(): void
    {
        $res = $this->generator->generateTypos("computer");
        foreach ($res as $key => $word) {
            $this->assertEquals($this->expected[$key], $word);
        }
    }


    /**
     * @covers ::generateTyposAsArray
     * @uses   \MLequer\Component\Typos\Generator\TypoGenerator
     * @uses   \MLequer\Component\Typos\Generator\AbstractTyposGenerator::__construct
     */
    public function testTyposAsArray(): void
    {
        $res = $this->generator->generateTyposAsArray("computer");
        $this->assertEquals($this->expected, $res);
    }


    private function getMockProvider(): TyposProviderInterface
    {
        $generator = function () {
            foreach ($this->expected as $word) {
                yield $word;
            }
        };
        $mock   = $this->getMockBuilder(TyposProviderInterface::class)
        ->getMock();  // = $this->createMock(TyposProviderInterface::class);
        $mock->expects($this->once())
            ->method('generateTypos')
            ->willReturn($generator());

        return $mock;
    }
}
