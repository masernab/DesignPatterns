<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class LinuxCheckbox implements Checkbox
{

    public function paint(): void
    {
        echo 'Linux Checkbox'.PHP_EOL;
    }
}