<?php

namespace Domain\designPatterns\Factory;

interface Keyboard
{
    public function render(): string;

    public function type(): void;
}