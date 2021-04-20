<?php

namespace Packages\System\Database\Seeds;

use Packages\System\Models\SystemUser;
use Illuminate\Database\Seeder;

class SystemSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        collect([
//            [
//                'name'  =>  'System Quote url',
//                'slug'  =>  'sistem-quote-url',
//                'value' =>  'https://testservices.wschilexpress.com/rating/api/v1.0/rates/courier',
//            ],
//            [
//                'name'  =>  'Ocp Apim Subscription Key',
//                'slug'  =>  'ocp-apim-subscription-key',
//                'value' =>  '6c9a69434a2c4f5a851c1de8ab4f9f89',
//            ]
//        ])->each(function ($setting){
//            $setting    =   SystemSetting::firstOrCreate(['slug' => $setting['slug']], $setting);
//        });
    }
}
