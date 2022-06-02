<?php


namespace Mk\Feed\DI;

use Mk\Feed\Storage;
use Nette;

/**
 * Class FeedExtension
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\DI
 */
class FeedExtension extends Nette\DI\CompilerExtension {
    /** @var array */
    private $defaults = array(
        'exportsDir' => '%wwwDir%',
        'exports'    => array()
    );

    public function loadConfiguration()
    {
        parent::loadConfiguration();

        $builder = $this->getContainerBuilder();
        $config = $this->getConfig($this->defaults);

        $builder->addDefinition($this->prefix('storage'))
            ->setClass(Storage::class)
            ->setArguments(array($config['exportsDir']));

        foreach ($config['exports'] as $export => $class) {
            if (!class_exists($class)) {
            }
            $builder->addDefinition($this->prefix($export))
                ->setClass($class);

        }

        if (class_exists('\Symfony\Component\Console\Command\Command')) {
            $builder->addDefinition($this->prefix('command'))
                ->setClass('Mk\Feed\Command\FeedCommand')
                ->setArguments(array($config))
                ->addTag('kdyby.console.command');
        }
    }
}
