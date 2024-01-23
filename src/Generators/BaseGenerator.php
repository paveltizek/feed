<?php

namespace Mk\Feed\Generators;

use Latte\Engine;
use Mk\Feed\Storage;
use Mk\Feed\FileEmptyException;
use Mk\Feed\ItemIncompletedException;

/**
 * Class BaseGenerator
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators
 */
abstract class BaseGenerator implements IGenerator {

    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    /** @var bool true if some products added */
    private $prepared = false;

    /** @var resource|bool|null temp file */
    private $handle;

    /** @var \Mk\Feed\Storage */
    private $storage;

    /** @var array */
    private $config;

    /** @var string */
    private $link;

    /** @var string */
    private $description;

    /** @var string */
    private $storeName;

    /**
     * BaseGenerator constructor.
     * @param \Mk\Feed\Storage $storage
     */
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void {
        $this->link = $link;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * @param string $storeName
     */
    public function setStoreName(string $storeName): void {
        $this->storeName = $storeName;
    }




    /**
     * @param $name
     * @return string path to template
     */
    abstract protected function getTemplate($name);


    /**
     * Prepare temp file
     */
    protected function prepare()
    {
        $this->handle = tmpfile();

        $this->prepareTemplate('header');
        $this->prepared = true;
    }

    /**
     * @param \Mk\Feed\Generators\IItem $item
     * @throws \Exception
     * @throws \Throwable
     */
    public function addItem(IItem $item)
    {
        if (!$this->prepared) {
            $this->prepare();
        }

        if (!$item->validate()) {
            throw new ItemIncompletedException('Item is not complete');
        }

        $latte = new Engine;
        $xmlItem = $latte->renderToString($this->getTemplate('item'), array('item' => $item));
        fwrite($this->handle, $xmlItem);
    }

    /**
     * Generate file by addItem from db for example
     * @return void
     */
    abstract function generate();

    /**
     * @param $filename
     * @return void
     */
    public function save($filename)
    {
        $this->generate();

        if (!$this->prepared) {
            throw new FileEmptyException('File has not any items');
        }

        $this->prepareTemplate('footer');

        $size = ftell($this->handle);
        rewind($this->handle);
        $this->storage->save($filename, fread($this->handle, $size));

        fclose($this->handle);

        $this->prepared = false;
    }

    /**
     * @param $template
     */
    protected function prepareTemplate($template)
    {

        $latte = new Engine;
        $content = $latte->renderToString($this->getTemplate($template), array('storeName' => $this->storeName, 'description' => $this->description, 'link' => $this->link));
        $file = $this->getTemplate($template);
        $footerHandle = fopen('nette.safe://' . $file, 'r');
        $footer = fread($footerHandle, filesize($file));
        fclose($footerHandle);
        fwrite($this->handle, $content);
//        fwrite($this->handle, $footer);
    }

}
