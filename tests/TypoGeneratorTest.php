<?php
// require './vendor/autoload.php';
use \PHPUnit\Framework\TestCase;
use Mlequer\Generator\TypoGenerator;

/**
 * Tests for the typos generator
 */
class TypoGeneratorTest extends TestCase
{

    public function testWrongKeys()
    {
        $options = ['wrongKeys' => true];
        $typoGen = new TypoGenerator($options);
        $typos = $typoGen->generate('test')->getTypos();

        foreach ($typos as $typo) {
            $this->assertEquals(strlen('test'), strlen($typo));
            $this->assertTrue('test' !== $typo);
        }
    }

    public function testMissedChars()
    {
        $options = ['missedChars' => true];
        $typoGen = new TypoGenerator($options);
        $typos = $typoGen->generate('test')->getTypos();

        foreach ($typos as $typo) {
            $this->assertEquals(strlen('test') - 1, strlen($typo));
        }
    }

    public function testTransposedChars()
    {
        $options = ['transposedChars' => true];
        $typoGen = new TypoGenerator($options);
        $typos = $typoGen->generate('test')->getTypos();

        $expected = ['etst', 'tset', 'tets'];

        $this->assertEquals(count($expected), 3);
        foreach ($typos as $typo) {
            $this->assertTrue(in_array($typo, $expected));
        }
    }

    public function testDoubleChars()
    {
        $options = ['doubleChars' => true];
        $typoGen = new TypoGenerator($options);
        $typos = $typoGen->generate('test')->getTypos();

        $expected = ['ttest', 'teest', 'tesst', 'testt'];

        $this->assertEquals(count($expected), 4);
        foreach ($typos as $typo) {
            $this->assertTrue(in_array($typo, $expected));
        }
    }

    public function testFlipBits()
    {
        $options = ['flipBits' => true];
        $typoGen = new TypoGenerator($options);
        $typos = $typoGen->generate('test')->getTypos();

        foreach ($typos as $typo) {
            $this->assertEquals(strlen('test'), strlen($typo));
            $this->assertTrue('test' !== $typo);
        }
    }

    public function testGenerateHomophones()
    {
        $options = ['generateHomophones' => true];
        $typoGen = new TypoGenerator($options);
        $typos = $typoGen->generate('heireloom')->getTypos();

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
