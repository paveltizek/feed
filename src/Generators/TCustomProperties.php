<?php
declare(strict_types=1);

namespace Mk\Feed\Generators;

trait TCustomProperties{


    /** @var CustomProperty[] */
    private array $customProperties = [];


    public function addCustomProperty(string $name, string $value):void {
        $this->customProperties[$name] = new CustomProperty($name, $value);
    }


    public function getCustomProperties():array {
        return $this->customProperties;
    }

}