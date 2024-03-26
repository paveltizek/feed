<?php
namespace Mk\Feed\Generators\Samba;

use Mk\Feed\Generators\BaseGenerator;

/**
 * Class HeurekaGenerator
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators
 * @see http://sluzby.heureka.cz/napoveda/xml-feed/ Documentation
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