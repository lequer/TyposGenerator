<?php

namespace MLequer\Command;

use Symfony\Component\Console\Application;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;
use MLequer\Command\TyposCommand;

class CreateUserCommandTest extends TestCase {

    private $tester;
    private $command;
    
    public function setUp() {
        $application = new Application();
        $application->add(new TyposCommand());

        $this->command = $application->find('typos:generate');
        $this->tester = new CommandTester($this->command);
    }

    public function testWrongKeysExecute() {
        $this->tester->execute(array(
            'command' => $this->command->getName(),
            'word' => 'test',
            '-w' => true
        ));
        $output = $this->tester->getDisplay();
        $this->assertContains('rest', $output);
    }
    
        public function testMissedCharsExecute() {
        $this->tester->execute(array(
            'command' => $this->command->getName(),
            'word' => 'test',
            '-m' => true
        ));
        $output = $this->tester->getDisplay();
        $this->assertContains('tst', $output);
    }

}
