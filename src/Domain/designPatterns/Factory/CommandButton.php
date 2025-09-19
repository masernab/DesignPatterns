<?php

namespace Domain\designPatterns\Factory;

use Illuminate\Support\Facades\Blade;

class CommandButton implements KeyboardButton
{
    public function render(): string
    {
        echo 'Command';
        return 'Command';
    }

    public function press(): void
    {
        // TODO: Implement onClick() method.
    }
}