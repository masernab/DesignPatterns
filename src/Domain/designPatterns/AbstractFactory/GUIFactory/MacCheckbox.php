<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class MacCheckbox implements Checkbox
{

    public function paint(): void
    {
        echo 'Mac Checkbox'.PHP_EOL;
    }
}