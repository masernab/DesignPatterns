<?php

namespace Domain\designPatterns\Factory;

class MacKeyboard implements Keyboard
{
    public function render(): string
    {
        echo 'Mac keyboard'.PHP_EOL;
        return 'Mac Keyboard';
    }

    public function type(): void
    {
        echo 'Typing: This is a text'.PHP_EOL;
    }
}