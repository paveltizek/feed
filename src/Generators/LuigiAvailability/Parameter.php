<?php

namespace Mk\Feed\Generators\LuigiAvailability;

use Mk, Nette;

/**
 * Class Parameter
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 */
class Parameter {

    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    protected $name;
    protected $value;
    protected $unit;
    protected $percentage;

    /**
     * Parameter constructor.
     * @param $name
     * @param $value
     * @param $unit
     */
    public function __construct($name, $value, $unit = null, $percentage = null)
    {
        $this->name = $name;
        $this->value = $value;

        $this->unit = $unit;
        $this->percentage = $percentage;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getUnit() {
        return $this->unit;
    }

    /**
     * @return null
     */
    public function getPercentage() {
        return $this->percentage;
    }




}
