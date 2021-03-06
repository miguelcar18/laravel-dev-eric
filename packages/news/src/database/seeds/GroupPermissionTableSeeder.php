<?php

namespace Packages\News\Database\Seeds;

use Illuminate\Database\Seeder;
use Packages\Admin\Models\Group;
use Packages\Admin\Models\Permission;

class GroupPermissionTableSeeder extends Seeder
{
    /**
     *  Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(array_keys(\Route::getRoutes()->getRoutesByName()))->each(function ($route) {
            Permission::firstOrCreate(['slug' => "route:{$route}"], ['name' => "route:{$route}"]);
        });

        $groupAdmin = Group::firstOrCreate([
            'slug' => 'news:admin',],
            [
                'name' => 'news:admin',
                'description' => ''
            ]);
        $dataAdmin = [
            'route:admin::home',
            'route:admin::api.auth.login',
            'route:admin::api.auth.logout',
            'route:admin::api.auth.me',
            'route:admin::api.auth.token.refresh',
            'route:admin::api.customer.index',
            'route:admin::api.group.index',
            'route:admin::api.group.assign_permission',
            'route:admin::api.group.group_permission ',
            'route:admin::api.permission.index',
            'route:admin::group.assig_permission',
            'route:admin::customer.index',
            'route:admin::customer.store',
            'route:admin::customer.create',
            'route:admin::customer.destroy',
            'route:admin::customer.show',
            'route:admin::customer.update',
            'route:admin::customer.edit',
            'route:admin::dashboard',
            'route:admin::group.store',
            'route:admin::group.index',
            'route:admin::group.create',
            'route:admin::group.destroy',
            'route:admin::group.update',
            'route:admin::group.show',
            'route:admin::group.edit',
            'route:admin::group.group_permission',
            'route:admin::permission.index',
            'route:admin::permission.store',
            'route:admin::permission.create',
            'route:admin::permission.show',
            'route:admin::permission.update',
            'route:admin::permission.destroy',
            'route:admin::permission.edit',
            'route:admin::refresh-csrf',
            'route:password.confirm',
            'route:dashboard',
            'route:verification.send',
            'route:verification.notice',
            'route:verification.verify',
            'route:password.request',
            'route:password.email',
            'route:login',
            'route:logout',
            'route:register',
            'route:password.update',
            'route:password.reset',
            'route:current-user.destroy',
            'route:password.confirm',
            'route:password.confirmation',
            'route:other-browser-sessions.destroy',
            'route:user-password.update',
            'route:profile.show',
            'route:user-profile-information.update',
            'route:current-user-photo.destroy',
            'route:two-factor.disable',
            'route:two-factor.enable',
            'route:two-factor.qr-code',
            'route:two-factor.recovery-codes',
            'route:verification.notice',
            'route:verification.verify',
            'route:news::',
            'route:news::api.article.index',
            'route:news::api.author.index',
            'route:news::api.message.index',
            'route:news::article.store',
            'route:news::article.index',
            'route:news::article.create',
            'route:news::article.show',
            'route:news::article.update',
            'route:news::article.destroy',
            'route:news::article.edit',
            'route:news::author.index',
            'route:news::author.store',
            'route:news::author.create',
            'route:news::author.show',
            'route:news::author.destroy',
            'route:news::author.update',
            'route:news::author.edit',
            'route:news::message.index',
            'route:news::message.store',
            'route:news::message.create',
            'route:news::message.show',
            'route:news::message.update',
            'route:news::message.destroy',
            'route:news::message.edit',
        ];
        $groupAdmin->assignPermissions($dataAdmin);

        $groupGerente = Group::firstOrCreate([
            'slug' => 'news:gerente',],
            [
                'name' => 'news:gerente',
                'description' => ''
            ]);
        $dataGerente = [
            'route:admin::home',
            'route:admin::api.auth.login',
            'route:admin::api.auth.logout',
            'route:admin::api.auth.me',
            'route:admin::api.auth.token.refresh',
            'route:admin::api.customer.index',
            'route:admin::api.group.index',
            'route:admin::api.group.group_permission ',
            'route:admin::api.permission.index',
            'route:admin::group.assig_permission',
            'route:admin::customer.index',
            'route:admin::customer.show',
            'route:admin::customer.update',
            'route:admin::customer.edit',
            'route:admin::dashboard',
            'route:admin::group.index',
            'route:admin::group.show',
            'route:admin::group.group_permission',
            'route:admin::permission.index',
            'route:admin::permission.show',
            'route:admin::refresh-csrf',
            'route:password.confirm',
            'route:dashboard',
            'route:verification.send',
            'route:verification.notice',
            'route:verification.verify',
            'route:password.request',
            'route:password.email',
            'route:login',
            'route:logout',
            'route:register',
            'route:password.update',
            'route:password.reset',
            'route:current-user.destroy',
            'route:password.confirm',
            'route:password.confirmation',
            'route:other-browser-sessions.destroy',
            'route:user-password.update',
            'route:profile.show',
            'route:user-profile-information.update',
            'route:current-user-photo.destroy',
            'route:two-factor.disable',
            'route:two-factor.enable',
            'route:two-factor.qr-code',
            'route:two-factor.recovery-codes',
            'route:verification.notice',
            'route:verification.verify',
            'route:news::',
            'route:news::api.article.index',
            'route:news::api.author.index',
            'route:news::api.message.index',
            'route:news::article.index',
            'route:news::article.show',
            'route:news::article.update',
            'route:news::article.edit',
            'route:news::author.index',
            'route:news::author.show',
            'route:news::author.update',
            'route:news::author.edit',
            'route:news::message.index',
            'route:news::message.show',
            'route:news::message.update',
            'route:news::message.edit',
        ];
        $groupGerente->assignPermissions($dataGerente);

        $groupEditor = Group::firstOrCreate([
            'slug' => 'news:editor',],
            [
                'name' => 'news:editor',
                'description' => ''
            ]);
        $dataEditor = [
            'route:admin::home',
            'route:admin::api.auth.login',
            'route:admin::api.auth.logout',
            'route:admin::api.auth.me',
            'route:admin::api.auth.token.refresh',
            'route:admin::api.customer.index',
            'route:admin::api.group.index',
            'route:admin::api.permission.index',
            'route:admin::customer.index',
            'route:admin::customer.store',
            'route:admin::customer.create',
            'route:admin::customer.show',
            'route:admin::dashboard',
            'route:admin::refresh-csrf',
            'route:password.confirm',
            'route:dashboard',
            'route:verification.send',
            'route:verification.notice',
            'route:verification.verify',
            'route:password.request',
            'route:password.email',
            'route:login',
            'route:logout',
            'route:register',
            'route:password.update',
            'route:password.reset',
            'route:current-user.destroy',
            'route:password.confirm',
            'route:password.confirmation',
            'route:other-browser-sessions.destroy',
            'route:user-password.update',
            'route:profile.show',
            'route:user-profile-information.update',
            'route:current-user-photo.destroy',
            'route:two-factor.disable',
            'route:two-factor.enable',
            'route:two-factor.qr-code',
            'route:two-factor.recovery-codes',
            'route:verification.notice',
            'route:verification.verify',
            'route:news::',
            'route:news::api.article.index',
            'route:news::api.author.index',
            'route:news::api.message.index',
            'route:news::article.store',
            'route:news::article.index',
            'route:news::article.create',
            'route:news::article.show',
            'route:news::author.index',
            'route:news::author.store',
            'route:news::author.create',
            'route:news::author.show',
            'route:news::message.index',
            'route:news::message.store',
            'route:news::message.create',
            'route:news::message.show',
        ];
        $groupEditor->assignPermissions($dataEditor);
    }
}
