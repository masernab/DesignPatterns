<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class MacButton implements Button
{

    public function paint(): void
    {
        echo 'Mac Button' . PHP_EOL;
    }
}