<?php

namespace App\Console\Commands;

use Domain\designPatterns\Factory\KeyboardFactory;
use Domain\designPatterns\Factory\MacKeyboardFactory;
use Domain\designPatterns\Factory\WindowsKeyboardFactory;
use Illuminate\Console\Command;

class application extends Command
{
    protected $signature = 'application';

    protected $description = 'Command description';

    public KeyboardFactory $keyboardFactory;

    public function handle(): void
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
            default => throw new \Exception("No support for {$os}"),
        };
    }
}
