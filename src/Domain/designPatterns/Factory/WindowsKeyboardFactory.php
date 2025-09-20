<?php

namespace Domain\designPatterns\Factory;

class WindowsKeyboardFactory extends KeyboardFactory
{
    public function createKeyboard(): Keyboard
    {
        return new WindowsKeyboard();
    }
}