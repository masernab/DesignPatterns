<?php

namespace Domain\designPatterns\Factory;

class WindowsKeyboard implements Keyboard
{
    public function render(): string
    {
        echo 'Windows Keyboard'.PHP_EOL;
        return 'Windows Keyboard';
    }

    public function type(): void
    {
        echo 'Typing: This is a text'.PHP_EOL;
    }
}