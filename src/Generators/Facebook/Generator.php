<?php
namespace Mk\Feed\Generators\Facebook;

use Mk\Feed\Generators\BaseGenerator;

/**
 * Class Generator
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Facebook
 * @see https://support.google.com/merchants/answer/188494 Documentation
 */
abstract class Generator extends BaseGenerator {

    /**
     * @param $name
     * @return string
     */
    protected function getTemplate($name)
    {
        $reflection = new \ReflectionClass(__CLASS__);
        return dirname($reflection->getFileName()) . '/latte/' . $name . '.latte';
    }

}