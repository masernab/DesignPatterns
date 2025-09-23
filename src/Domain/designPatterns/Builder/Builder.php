<?php

namespace Domain\designPatterns\Builder;

use Illuminate\Support\Carbon;

interface Builder
{
    public function reset(): void;

    public function setName(string $name): Builder;

    public function setBirth(Carbon $date): Builder;

    public function setDeath(Carbon $date): Builder;

    public function setAge(int $age): Builder;

    public function setSpecie(string $specie): Builder;

    public function setOccupation(string $occupation): Builder;

    public function setOrigin(string $origin): Builder;

    public function setResidence(string $residence): Builder;

    public function setTransformations(array $transformations): Builder;

    public function setRelatives(array $relatives): Builder;

    public function build(): DragonBallCharacter;
}