<?php

namespace Domain\designPatterns\Builder;

use Illuminate\Support\Carbon;

class DragonBallCharacterDirector
{
    private ?Builder $builder;

    public function __construct(Builder $builder = null)
    {
        $this->builder = $builder;
    }

    public function setBuilder(Builder $builder): self
    {
        $this->builder = $builder;
        return $this;
    }

    public function createGoku(): DragonBallCharacter
    {
        return $this->builder
            ->setName("Son Goku")
            ->setBirth(Carbon::create(-737, 4, 16))
            ->setAge(43)
            ->setSpecie("Saiyan")
            ->setOccupation("Martial Artist")
            ->setOrigin("Planet Vegeta")
            ->setResidence("Mount Paozu")
            ->setTransformations([
                "Kaioken",
                "Super Saiyan",
                "Super Saiyan 2",
                "Super Saiyan 3",
                "Super Saiyan God",
                "Super Saiyan Blue",
                "Ultra Instinct"
            ])
            ->setRelatives(["Gohan", "Goten", "Chi-Chi", "Bardock"])
            ->build();
    }

    public function createVegeta(): DragonBallCharacter
    {
        return $this->builder
            ->setName("Vegeta")
            ->setBirth(Carbon::create(-732, 8, 14))
            ->setAge(48)
            ->setSpecie("Saiyan")
            ->setOccupation("Prince of Saiyans")
            ->setOrigin("Planet Vegeta")
            ->setResidence("Capsule Corp")
            ->setTransformations([
                "Super Saiyan",
                "Super Saiyan 2",
                "Super Saiyan God",
                "Super Saiyan Blue",
                "Super Saiyan Blue Evolution"
            ])
            ->setRelatives(["Bulma", "Trunks", "Bulla", "King Vegeta"])
            ->build();
    }
}