<?php

namespace App\TestOneBundle\Command;

use App\TestOneBundle\Interfaces\ConnectorInterface;
use App\TestOneBundle\Services\Connector;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TestOneCommand extends Command
{
    /**
     * @var ConnectorInterface|Connector
     */
    protected $connector;

    /**
     * TestOneCommand constructor.
     * @param ConnectorInterface $connector
     * @param null $name
     */
    public function __construct(ConnectorInterface $connector, $name = null)
    {
        parent::__construct($name);
        $this->connector = $connector;
    }

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('test:command:one');
    }

    /**
     * Execute command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->connector->flushManagers();
    }
}