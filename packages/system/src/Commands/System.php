<?php

namespace Packages\System\Console\Commands;

use Illuminate\Console\Command;

class System extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:seed {--F|force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->call('db:seed',[
            '--class'   =>  'Packages\\System\\Database\\Seeds\\DatabaseSeeder',
        ]);
        $this->option('--force');

        return 0;
    }
}
