<?php

namespace App\Console\Commands;

use App\Models\TaskScheduling;
use Illuminate\Console\Command;

class ProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'taskScheduling:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new columns for table Task Scheduling';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $taskScheduling = new TaskScheduling();
        $taskScheduling->save();

    }
}
