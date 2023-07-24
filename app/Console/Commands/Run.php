<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Run extends Command
{
    protected $signature = 'run';
    protected $description = 'Start the PHP development server';

    public function handle()
    {
        $host = 'localhost';
        $port = 8000;

        $this->line("Laravel development server started on http://{$host}:{$port}");

        // Start the PHP built-in development server
        passthru("php -S {$host}:{$port} -t public");
    }
}
