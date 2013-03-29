<?php

namespace Magazento\ConsoleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AlertCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('console:alert')
            ->setDescription('Money alert ')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('***** Alert Money****');
        
        $this->getContainer()->get('magazento_console')->AlertAll(); 
    }
}