<?php

namespace Mk\Feed\Command;

use Symfony\Component\Console\Command\Command,
	Symfony\Component\Console\Input\InputInterface,
	Symfony\Component\Console\Output\OutputInterface,
	Symfony\Component\Console\Input\InputOption;

use Nette,
	Mk;

class FeedCommand extends Command {

	/** @var \Nette\DI\Container */
	private $container;

	/** @var array */
	private $config;

	public function __construct(array $config = array(), Nette\DI\Container $container)
	{
		parent::__construct();

		$this->container = $container;
		$this->config = $config;
	}

	protected function configure()
	{
		$this->setName('Feed:export')
			->setDescription('Export product feed')
			->addOption('show', 's', InputOption::VALUE_NONE, 'Print available exports')
			->addOption('feed', 'f', InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$show = $input->getOption('show');
		$feeds = $input->getOption('feed');

		if ($show) {
			$output->writeln('Available exports:');

			foreach ($this->config['exports'] as $k => $v) {
				if ($v) {
					$output->writeln('- ' . $k);
				}
			}
		}

		$feeds = $feeds ?: array_keys($this->config['exports']);
		if (count($feeds)) {
			foreach ($feeds as $feed) {
				if (!isset($this->config['exports'][$feed]) || !$this->config['exports'][$feed]) {
					$output->writeln('Generator for ' . $feed . ' doesn\'t exist');
				}

				$generator = $this->container->getService('feed.' . $feed);

				$generator->save($feed . '.xml');
				$output->writeln('Feed ' . $feed . ' done');
			}
		}
	}
}