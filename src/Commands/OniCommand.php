<?php

namespace OniiCoder\OniDebugger\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class OniCommand extends Command
{
    protected $signature = 'oni:debugger';

    protected $description = 'Oni Debugger';

    public function handle()
    {
        $this->info('Oni Debugger. Press Ctrl+C to exit.');

        $command = 'tail -f storage/logs/debug.log';

        // Open a pipe to the process and set non-blocking mode
        $process = proc_open($command, [
            ['pipe', 'r'],
            ['pipe', 'w'],
            ['pipe', 'w']
        ], $pipes);

        $output = new ConsoleOutput();

        if (is_resource($process)) {
            // Continuously read from the process and update the terminal output
            while ($line = fgets($pipes[1])) {
                $output->write("\033[0G"); // Move cursor to the beginning of the line
                $output->write($line); // Update output with new line
            }

            // Close the pipe
            fclose($pipes[0]);
            fclose($pipes[1]);
            fclose($pipes[2]);

            // Close the process
            proc_close($process);
        }
    }
}