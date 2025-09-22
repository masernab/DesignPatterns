<?php

namespace App\Console\Commands;

use Domain\designPatterns\AbstractFactory\GUIFactory\GUIFactory;
use Domain\designPatterns\AbstractFactory\GUIFactory\WInFactory;
use Domain\designPatterns\Factory\KeyboardFactory;
use Domain\designPatterns\Factory\LinuxKeyboardFactory;
use Domain\designPatterns\Factory\MacKeyboardFactory;
use Domain\designPatterns\Factory\WindowsKeyboardFactory;
use Illuminate\Console\Command;

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
                ['ID', 'Pattern', 'Description'],
                [
                    [1, 'Factory', 'Creational pattern'],
                    [2, 'Abstract Factory', 'Creational pattern'],
                ]
            );

            $pattern = $this->components->choice(
                'Choose a pattern:',
                [
                    '1' => 'factory',
                    '2' => 'abstract factory'
                ],
                '1'
            );
        }

        match ($pattern) {
            '1', 'factory' => $this->runFactory(),
            '2', 'abstract factory' => $this->runAbstractFactory(),
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
}
