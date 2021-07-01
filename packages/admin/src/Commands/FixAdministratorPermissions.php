<?php

namespace Packages\Admin\Console\Commands;

use Illuminate\Console\Command;

class FixAdministratorPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:fix-administrator-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix the administrator permissions (routes)';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Fixing administrator permissions...');
        $this->call('db:seed', [
            '--class' => 'Packages\\Admin\\Database\\Seeds\\AdministratorPermissionsFixer',
        ]);

        return 0;
    }
}
