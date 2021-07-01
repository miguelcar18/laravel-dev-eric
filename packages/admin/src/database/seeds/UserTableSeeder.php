<?php

namespace Packages\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Packages\Admin\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Usuario Administrador',
                'email' => 'administrator@example.com',
                'password' => 'password',
                'email_verified_at' => date('Y-m-d H:m:s'),
            ],
        ])->each(function ($user) {
            $user = User::firstOrCreate(['email' => $user['email']], $user);
            if ($user->wasRecentlyCreated) {
                $user->setPassword($user['password']);
            }
        });
    }
}
