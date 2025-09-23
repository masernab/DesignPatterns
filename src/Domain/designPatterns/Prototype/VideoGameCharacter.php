<?php

namespace Domain\designPatterns\Prototype;

class VideoGameCharacter
{
    public function __construct(
        private string $name,
        private int $level,
        private int $healthPoints,
        private int $manaPoints,
        public string $faction,
        public string $class,
        public bool $isAlive = true,
        protected array $skills = [],
        protected array $inventory = []
    ) {
    }

    public function __clone()
    {
        $this->name .= " (Clone)";
    }

    public function takeDamage(int $damage): void
    {
        $this->healthPoints -= $damage;
        if ($this->healthPoints <= 0) {
            $this->isAlive = false;
            $this->healthPoints = 0;
        }
    }

    public function heal(int $points): void
    {
        if ($this->isAlive) {
            $this->healthPoints += $points;
        }
    }

    public function addSkill(string $skill): void
    {
        $this->skills[] = $skill;
    }

    public function addItem(string $item): void
    {
        $this->inventory[] = $item;
    }

    public function summary(): string
    {
        $lines = [];

        if (! empty($this->name)) {
            $lines[] = "Name: {$this->name}";
        }

        if (! empty($this->class)) {
            $lines[] = "Class: {$this->class}";
        }

        if (! empty($this->faction)) {
            $lines[] = "Faction: {$this->faction}";
        }

        if (! empty($this->level)) {
            $lines[] = "Level: {$this->level}";
        }

        if (isset($this->healthPoints)) {
            $lines[] = "HP: {$this->healthPoints}";
        }

        if (isset($this->manaPoints)) {
            $lines[] = "MP: {$this->manaPoints}";
        }

        if (! empty($this->skills)) {
            $lines[] = "Skills: ".$this->listSkills();
        }

        if (! empty($this->inventory)) {
            $lines[] = "Inventory: ".$this->listInventory();
        }

        $lines[] = "Status: ".($this->isAlive ? "Alive" : "Dead");

        return implode(PHP_EOL, $lines).PHP_EOL;
    }

    private function listSkills(): string
    {
        return $this->skills ? implode(', ', $this->skills) : 'None';
    }

    private function listInventory(): string
    {
        return $this->inventory ? implode(', ', $this->inventory) : 'Empty';
    }
}