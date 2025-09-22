<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

class WInFactory implements GUIFactory
{

    public function createButton(): Button
    {
        return new WinButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new WinCheckbox();
    }
}