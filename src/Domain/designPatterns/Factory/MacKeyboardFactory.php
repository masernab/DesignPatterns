<?php

namespace Domain\designPatterns\Factory;

class MacKeyboardFactory extends KeyboardFactory
{
    public function createKeyboard(): Keyboard
    {
        return new MacKeyboard();
    }
}