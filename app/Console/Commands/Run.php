<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunCommand extends Command
{
    protected $signature = 'run';
    protected $description = 'Start the PHP development server';

    public function handle()
    {
        $this->info('Laravel development server started: http://localhost:8000');

        // Start the PHP built-in development server
        passthru('php -S localhost:8000 -t public');
    }
}
