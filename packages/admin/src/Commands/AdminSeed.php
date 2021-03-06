<?php

namespace Packages\Admin\Console\Commands;

use Illuminate\Console\Command;

class AdminSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:seed {--F|force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the Admin Package database seeds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Running Admin Seeder...');
        $this->call('db:seed',[
            '--class'   =>  'Packages\\Admin\\Database\\Seeds\\DatabaseSeeder',
            '--force' => $this->option('force'),
        ]);

        return 0;
    }
}
