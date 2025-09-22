<?php

namespace Domain\designPatterns\AbstractFactory\GUIFactory;

interface GUIFactory
{
    public function createButton(): Button;

    public function createCheckbox(): Checkbox;
}