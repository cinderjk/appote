<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FreshData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Doing migration, seeding, and cache clearing at once.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Doing migration, seeding, and cache clearing at once.');
        $this->call('migrate:fresh');
        $this->line('Migrate done.');
        $this->call('db:seed');
        $this->line('Seed done.');
        $this->call('optimize:clear');
        $this->line('Cache cleared.');
        $this->info('Fresh data done.');
    }
}
