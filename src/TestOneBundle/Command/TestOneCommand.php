<?php

namespace App\TestOneBundle\Command;

use App\TestOneBundle\Services\Connector;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestOneCommand extends Command
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('test:command:one');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $connector = new Connector();
        $connector->flushManagers();
    }
}