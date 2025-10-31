<?php
declare(strict_types=1);

namespace Mk\Feed\Generators;

class CustomProperty
{

    private string $name;
    private string $value

    ;

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function setValue(string $value): void {
        $this->value = $value;
    }
}