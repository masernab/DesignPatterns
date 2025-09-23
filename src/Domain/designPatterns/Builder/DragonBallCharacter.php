<?php

namespace Domain\designPatterns\Builder;

use Illuminate\Support\Carbon;

class DragonBallCharacter
{
    public function __construct(
        public ?string $name = null,
        public ?Carbon $birth = null,
        public ?Carbon $death = null,
        public ?int $age = null,
        public ?string $specie = null,
        public ?string $occupation = null,
        public ?string $origin = null,
        public ?string $residence = null,
        public ?array $transformations = [],
        public ?array $relatives = [],
    ) {}

    public function summary(): string
    {
        $lines = [];

        if (!empty($this->name)) {
            $lines[] = "Name: {$this->name}";
        }

        if (!empty($this->specie)) {
            $lines[] = "Specie: {$this->specie}";
        }

        if (!empty($this->occupation)) {
            $lines[] = "Occupation: {$this->occupation}";
        }

        if (!empty($this->origin)) {
            $lines[] = "Origin: {$this->origin}";
        }

        if (!empty($this->residence)) {
            $lines[] = "Residence: {$this->residence}";
        }

        if (isset($this->death)) {
            $status = $this->death ? 'Deceased' : 'Alive';
            $lines[] = "Status: {$status}";
        }

        if (!empty($this->age)) {
            $lines[] = "Age: {$this->age}";
        }

        if (!empty($this->transformations)) {
            $forms = implode(', ', $this->transformations);
            $lines[] = "Transformations: {$forms}";
        }

        if (!empty($this->relatives)) {
            $family = implode(', ', $this->relatives);
            $lines[] = "Relatives: {$family}";
        }

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }
}