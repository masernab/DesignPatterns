<?php

namespace Domain\designPatterns\Factory;

interface KeyboardButton
{
    public function render(): string;

    public function press(): void;
}