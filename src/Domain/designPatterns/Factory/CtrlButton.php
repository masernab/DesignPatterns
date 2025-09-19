<?php

namespace Domain\designPatterns\Factory;

use Illuminate\Support\Facades\Blade;

class CtrlButton implements KeyboardButton
{
    public function render(): string
    {
        echo 'Ctrl';
        return 'Ctrl';
    }

    public function press(): void
    {
        // TODO: Implement onClick() method.
    }
}