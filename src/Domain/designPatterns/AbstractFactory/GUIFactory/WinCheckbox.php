<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class WinCheckbox implements Checkbox
{

    public function paint(): void
    {
        echo 'Win Checkbox'.PHP_EOL;
    }
}