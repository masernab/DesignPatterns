<?php

namespace Domain\designPatterns\Factory;

class WindowsKeyboardFactory extends KeyboardFactory
{
    public function createButton(): KeyboardButton
    {
        return new CtrlButton();
    }
}