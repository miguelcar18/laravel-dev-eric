<?php

namespace Packages\News\Console\Commands;

use Illuminate\Console\Command;

class NewsSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:seed {--F|force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the News Package database seeds';

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
        $this->info('Running News Seeder...');
        $this->call('db:seed',[
            '--class'   =>  'Packages\\News\\Database\\Seeds\\DatabaseSeeder',
            '--force' => $this->option('force'),
        ]);

        return 0;
    }
}
