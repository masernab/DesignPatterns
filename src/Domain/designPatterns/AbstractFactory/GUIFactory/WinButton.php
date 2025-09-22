<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class WinButton implements Button
{

    public function paint(): void
    {
        echo 'WIn Button' . PHP_EOL;
    }
}