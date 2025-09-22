<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class LinuxButton implements Button
{

    public function paint(): void
    {
        echo 'Linux Button' . PHP_EOL;
    }
}