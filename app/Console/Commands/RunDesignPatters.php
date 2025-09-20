<?php

namespace App\Console\Commands;

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

    public function handle(): void
    {
        $pattern = $this->argument('pattern');

        if (!$pattern) {

            $this->info('#----Design Patterns Application-----#');

            $this->newLine();
            $this->components->twoColumnDetail('<fg=green>Available patterns:</>');

            $this->table(
                ['ID', 'Pattern', 'Description'],
                [
                    [1, 'Factory', 'Creational pattern'],
                ]
            );

            $pattern = $this->components->choice(
                'Choose a pattern:',
                ['1' => 'factory'],
                '1'
            );
        }

        match ($pattern) {
            '1', 'factory' => $this->runFactory(),
            default => throw new \Exception("Pattern {$pattern} not found"),
        };
    }

    public function runFactory(): void
    {
        try {
            $this->initialization();
            $this->keyboardFactory->render();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @throws \Exception
     */
    private function initialization(): void
    {
        $os = PHP_OS_FAMILY;

        $this->keyboardFactory = match ($os) {
            'Windows' => new WindowsKeyboardFactory(),
            'Darwin' => new MacKeyboardFactory(),
            'Linux' => new LinuxKeyboardFactory(),
            default => throw new \Exception("No support for {$os}"),
        };
    }
}
