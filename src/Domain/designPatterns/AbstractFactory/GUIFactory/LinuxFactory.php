<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class LinuxFactory implements GUIFactory
{

    public function createButton(): Button
    {
        return new LinuxButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new LinuxCheckbox();
    }
}