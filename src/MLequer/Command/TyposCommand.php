<?php

/*
 * Copyright (c) Michel Le Quer
 * All rights reserved.
 */

namespace MLequer\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use MLequer\Generator\TypoGenerator;

/**
 * The setup commmand
 *
 * @author michel
 */
class TyposCommand extends Command
{

    protected function configure()
    {
        $this
                ->setName('typos:generate')
                ->setDescription('Return generated typos for a word')
                ->addArgument('word', InputArgument::REQUIRED, 'Word')
                ->addOption('wrong-keys', 'w', InputOption::VALUE_NONE, 'generate wrong key typos')
                ->addOption('missed-chars', 'm', InputOption::VALUE_NONE, 'generate missed chars typos')
                ->addOption('transposed-chars', 't', InputOption::VALUE_NONE, 'generate transposed chars typos')
                ->addOption('double-chars', 'd', InputOption::VALUE_NONE, 'generate double chars typos')
                ->addOption('flip-bits', 'f', InputOption::VALUE_NONE, 'generate flip-bits typos')
                ->addOption('generate-homophones', 'g', InputOption::VALUE_NONE, 'generate homophones typos')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $options = [
            'wrongKeys' => $input->getOption('wrong-keys'),
            'missedChars' => $input->getOption('missed-chars'),
            'transposedChars' => $input->getOption('transposed-chars'),
            'doubleChars' => $input->getOption('double-chars'),
            'flipBits' => $input->getOption('flip-bits'),
            'generateHomophones' => $input->getOption('generate-homophones'),
        ];

        $generator = new TypoGenerator($options);
        $output->writeln($generator->generate($input->getArgument('word'))->getTypos());
    }
}
