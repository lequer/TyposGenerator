<?php
require './vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Mlequer\Generator\TypoGenerator;

class TypoGeneratorTest extends TestCase
{

    public function testWrongKeys()
    {
        $options = ['wrongKeys' => true];
        $tg = new TypoGenerator($options);
        $typos = $tg->generate('test')->getTypos();

        foreach ($typos as $typo) {
            $this->assertEquals(strlen('test'), strlen($typo));
            $this->assertTrue('test' !== $typo);
        }
    }

    public function testMissedChars()
    {
        $options = ['missedChars' => true];
        $tg = new TypoGenerator($options);
        $typos = $tg->generate('test')->getTypos();

        foreach ($typos as $typo) {
            $this->assertEquals(strlen('test') - 1, strlen($typo));
        }
    }

    public function testTransposedChars()
    {
        $options = ['transposedChars' => true];
        $tg = new TypoGenerator($options);
        $typos = $tg->generate('test')->getTypos();

        $expected = ['etst', 'tset', 'tets'];

        $this->assertEquals(count($expected), 3);
        foreach ($typos as $typo) {
            $this->assertTrue(in_array($typo, $expected));
        }
    }

    public function testDoubleChars()
    {
        $options = ['doubleChars' => true];
        $tg = new TypoGenerator($options);
        $typos = $tg->generate('test')->getTypos();

        $expected = ['ttest', 'teest', 'tesst', 'testt'];

        $this->assertEquals(count($expected), 4);
        foreach ($typos as $typo) {
            $this->assertTrue(in_array($typo, $expected));
        }
    }

    public function testFlipBits()
    {
        $options = ['flipBits' => true];
        $tg = new TypoGenerator($options);
        $typos = $tg->generate('test')->getTypos();

        foreach ($typos as $typo) {
            $this->assertEquals(strlen('test'), strlen($typo));
            $this->assertTrue('test' !== $typo);
        }
    }

    public function testGenerateHomophones()
    {
        $options = ['generateHomophones' => true];
        $tg = new TypoGenerator($options);
        $typos = $tg->generate('heireloom')->getTypos();

        $expected = array(
            'aireloom',
            'erreloom',
            'ereeloom',
            'heirelowom',
        );

        $this->assertEquals(count($expected), 4);
        foreach ($typos as $typo) {
            $this->assertTrue(in_array($typo, $expected));
        }
    }
}
