<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeAndDev extends Command
{
    protected $signature = 'serve';
    protected $description = 'Run npm start';

    public function handle()
    {
        // Get the Laravel project root directory
        $projectPath = base_path();

        // Command to run npm start (You can modify this if needed)
        $npmStartCommand = 'npm start';

        // Execute npm start using proc_open for better process handling
        $process = proc_open($npmStartCommand, [0 => STDIN, 1 => STDOUT, 2 => STDERR], $pipes, $projectPath);

        // Wait for the process to finish
        $status = proc_get_status($process);
        while ($status['running']) {
            usleep(100000); // Sleep for 100ms
            $status = proc_get_status($process);
        }

        // Close the process
        proc_close($process);
    }
}
