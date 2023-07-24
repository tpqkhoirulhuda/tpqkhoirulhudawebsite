<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Run extends Command
{
    protected $signature = 'run';
    protected $description = 'Start the PHP development server';

    public function handle()
    {
        $url = env('APP_URL', 'localhost:8000');

        // Remove "http://" from the URL if present
        $url = str_replace(['http://', 'https://'], '', $url);

        $this->line("Laravel development server started on http://{$url}");

        // Start the PHP built-in development server
        passthru("php -S {$url} -t public");
    }
}
