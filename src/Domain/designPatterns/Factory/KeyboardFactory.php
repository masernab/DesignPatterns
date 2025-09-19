<?php

namespace Domain\designPatterns\Factory;

abstract class KeyboardFactory
{
    abstract public function createButton(): KeyboardButton;

    public function render(): void
    {
        $button = $this->createButton();
        $button->render();
        $button->press();
    }
}

