<?php

namespace App\Console\Commands;

use Domain\designPatterns\AbstractFactory\GUIFactory\GUIFactory;
use Domain\designPatterns\AbstractFactory\GUIFactory\LinuxFactory;
use Domain\designPatterns\AbstractFactory\GUIFactory\MacFactory;
use Domain\designPatterns\AbstractFactory\GUIFactory\WInFactory;
use Domain\designPatterns\Builder\DragonBallCharacterDirector;
use Domain\designPatterns\Builder\DragonBallCharacterBuilder;
use Domain\designPatterns\Factory\KeyboardFactory;
use Domain\designPatterns\Factory\LinuxKeyboardFactory;
use Domain\designPatterns\Factory\MacKeyboardFactory;
use Domain\designPatterns\Factory\WindowsKeyboardFactory;
use Domain\designPatterns\Prototype\VideoGameCharacter;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class RunDesignPatters extends Command
{
    protected $signature = 'design-patterns:run {pattern?}';

    protected $description = 'Run design patterns example';

    public KeyboardFactory $keyboardFactory;
    public GUIFactory $guiFactory;

    public function handle(): void
    {
        $pattern = $this->argument('pattern');

        if (! $pattern) {
            $this->info('#----Design Patterns Application-----#');

            $this->newLine();
            $this->components->twoColumnDetail('<fg=green>Available patterns:</>');

            $this->table(
                ['ID', 'Pattern', 'Family'],
                [
                    [1, 'Factory',          'Creational pattern'],
                    [2, 'Abstract Factory', 'Creational pattern'],
                    [3, 'Builder',          'Creational pattern'],
                    [4, 'Prototype',        'Creational pattern'],
                ]
            );

            $pattern = $this->components->choice(
                'Choose a pattern:',
                [
                    '1' => 'factory',
                    '2' => 'abstract factory',
                    '3' => 'builder',
                    '4' => 'prototype',
                ],
                '1'
            );
        }

        match ($pattern) {
            '1', 'factory' => $this->runFactory(),
            '2', 'abstract factory' => $this->runAbstractFactory(),
            '3', 'builder' => $this->runBuilder(),
            '4', 'prototype' => $this->runPrototype(),
            default => throw new \Exception("Pattern {$pattern} not found"),
        };
    }

    public function runFactory(): void
    {
        try {
            $this->initializeFactory();
            $this->keyboardFactory->render();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @throws \Exception
     */
    private function initializeFactory(): void
    {
        $os = PHP_OS_FAMILY;

        $this->keyboardFactory = match ($os) {
            'Windows' => new WindowsKeyboardFactory(),
            'Darwin' => new MacKeyboardFactory(),
            'Linux' => new LinuxKeyboardFactory(),
            default => throw new \Exception("No support for {$os}"),
        };
    }

    private function initializeAbstractFactory(): void
    {
        $os = PHP_OS_FAMILY;

        $this->guiFactory = match ($os) {
            'Windows' => new WInFactory(),
            'Darwin' => new MacFactory(),
            'Linux' => new LinuxFactory(),
            default => throw new \Exception("No support for {$os}"),
        };
    }

    private function runAbstractFactory(): void
    {
        try {
            $this->initializeAbstractFactory();
            $button = $this->guiFactory->createButton();
            $checkbox = $this->guiFactory->createCheckbox();

            $button->paint();
            $checkbox->paint();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    private function runBuilder(): void
    {
        $goku = (new DragonBallCharacterBuilder())
            ->setName("Son Goku")
            ->setSpecie("Saiyan")
            ->setOrigin("Planet Vegeta")
            ->setTransformations([
                "Kaioken",
                "Super Saiyan",
            ])
            ->setRelatives(["Gohan", "Goten", "Chi-Chi", "Bardock"])
            ->build();

        echo $goku->summary();

        echo PHP_EOL;

        //Using Director
        $vegeta = (new DragonBallCharacterDirector())
            ->setBuilder(new DragonBallCharacterBuilder())
            ->createVegeta();

        echo $vegeta->summary();
    }

    private function runPrototype(): void
    {
        $mage = new VideoGameCharacter(
            name: "Arkanis",
            level: 30,
            healthPoints: 250,
            manaPoints: 500,
            faction: "Alliance",
            class: "Mage",
            skills: ["Fireball", "Teleport"],
            inventory: ["Magic Staff", "Potion"]
        );

        $mageClone = clone $mage;
        $mageClone->addItem("Crystal Shard");
        $mageClone->heal(50);

        print_r($mage);
        print_r($mageClone);
    }
}
