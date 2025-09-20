<?php

namespace Domain\designPatterns\Factory;

class LinuxKeyboardFactory extends KeyboardFactory
{
    public function createKeyboard(): Keyboard
    {
        return new LinuxKeyboard();
    }

}