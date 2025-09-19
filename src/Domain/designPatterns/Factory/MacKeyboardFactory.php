<?php

namespace Domain\designPatterns\Factory;

class MacKeyboardFactory extends KeyboardFactory
{
    public function createButton(): KeyboardButton
    {
        return new CommandButton();
    }
}