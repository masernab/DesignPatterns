<?php

namespace Domain\designPatterns\Prototype;

class VideoGame
{
    public function __construct(
        public string $name,
        public string $description,
    ) {
    }
}