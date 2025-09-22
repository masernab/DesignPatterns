<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class MacFactory implements GUIFactory
{

    public function createButton(): Button
    {
        return new MacButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new MacCheckbox();
    }
}