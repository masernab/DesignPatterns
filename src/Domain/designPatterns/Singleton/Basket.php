<?php

namespace Domain\designPatterns\Singleton;

class Basket
{
    private static ?Basket $instance = null;
    private array $items;

    private function __construct()
    {
        $this->items = [];
    }

    public static function getInstance(): Basket
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function addItem(string $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}