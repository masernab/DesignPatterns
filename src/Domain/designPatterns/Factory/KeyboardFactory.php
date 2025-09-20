<?php

namespace Domain\designPatterns\Factory;

abstract class KeyboardFactory
{
    abstract public function createKeyboard(): Keyboard;

    public function render(): void
    {
        $button = $this->createKeyboard();
        $button->render();
        $button->type();
    }
}

