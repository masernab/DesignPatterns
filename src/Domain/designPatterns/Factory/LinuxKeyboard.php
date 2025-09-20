<?php

namespace Domain\designPatterns\Factory;

use Domain\designPatterns\Factory\Keyboard;

class LinuxKeyboard implements Keyboard
{

    public function render(): string
    {
        echo 'Linux keyboard'.PHP_EOL;
        return 'Linux Keyboard';
    }

    public function type(): void
    {
        echo 'Typing: This is a text'.PHP_EOL;
    }
}