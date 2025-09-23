<?php

namespace Domain\designPatterns\Builder;

use Illuminate\Support\Carbon;

class DragonBallCharacterBuilder implements Builder
{

    protected ?DragonBallCharacter $character = null;

    protected ?string $name = null;

    protected ?Carbon $birth = null;

    protected ?Carbon $death = null;

    protected ?int $age = null;

    protected ?string $specie = null;

    protected ?string $occupation = null;

    protected ?string $origin = null;

    protected ?string $residence = null;

    protected array $transformations = [];

    protected array $relatives = [];

    public function reset(): void
    {
        $this->character = new DragonBallCharacter();
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setBirth(Carbon $date): self
    {
        $this->birth = $date;
        return $this;
    }

    public function setDeath(Carbon $date): self
    {
        $this->death = $date;
        return $this;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function setSpecie(string $specie): self
    {
        $this->specie = $specie;
        return $this;
    }

    public function setOccupation(string $occupation): self
    {
        $this->occupation = $occupation;
        return $this;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;
        return $this;
    }

    public function setResidence(string $residence): self
    {
        $this->residence = $residence;
        return $this;
    }

    public function setTransformations(array $transformations): self
    {
        $this->transformations = $transformations;
        return $this;
    }

    public function setRelatives(array $relatives): self
    {
        $this->relatives = $relatives;
        return $this;
    }

    public function build(): DragonBallCharacter
    {

        return new DragonBallCharacter(
            name: $this->name,
            birth: $this->birth,
            death: $this->death,
            age: $this->age,
            specie: $this->specie,
            occupation: $this->occupation,
            origin: $this->origin,
            residence: $this->residence,
            transformations: $this->transformations,
            relatives: $this->relatives,
        );
    }
}