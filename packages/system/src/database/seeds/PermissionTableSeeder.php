<?php

namespace Packages\System\Database\Seeds;

use Illuminate\Database\Seeder;
use Packages\Admin\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::home',], [
//            'name' => 'admin::home',
//
//            'description' => 'modificar articulo'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.auth.login',], [
//            'name' => 'admin::api.auth.login',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.auth.logout',], [
//            'name' => 'admin::api.auth.logout',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.auth.me',], [
//            'name' => 'admin::api.auth.me',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.auth.token.refresh',], [
//            'name' => 'admin::api.auth.token.refresh',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.customer.index',], [
//            'name' => 'admin::api.customer.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.group.index',], [
//            'name' => 'admin::api.group.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.group.assign_permission',], [
//            'name' => 'admin::api.group.assign_permission',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.group.group_permission',], [
//            'name' => 'admin::api.group.group_permission',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::api.permission.index',], [
//            'name' => 'admin::api.permission.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.assig_permission',], [
//            'name' => 'admin::group.assig_permission',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::customer.index',], [
//            'name' => 'admin::customer.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:user-index',], [
//            'name' => 'index usuario',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::customer.store',], [
//            'name' => 'admin::customer.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::customer.create',], [
//            'name' => 'admin::customer.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::customer.destroy',], [
//            'name' => 'admin::customer.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::customer.show',], [
//            'name' => 'admin::customer.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::customer.update',], [
//            'name' => 'admin::customer.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::customer.edit',], [
//            'name' => 'admin::customer.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::dashboard',], [
//            'name' => 'admin::dashboard',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.store',], [
//            'name' => 'admin::group.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.index',], [
//            'name' => 'admin::group.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.create',], [
//            'name' => 'admin::group.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.destroy',], [
//            'name' => 'admin::group.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.update',], [
//            'name' => 'admin::group.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.show',], [
//            'name' => 'admin::group.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.edit',], [
//            'name' => 'admin::group.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::group.group_permission',], [
//            'name' => 'admin::group.group_permission',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::permission.index',], [
//            'name' => 'admin::permission.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::permission.store',], [
//            'name' => 'admin::permission.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::permission.create',], [
//            'name' => 'admin::permission.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::permission.show',], [
//            'name' => 'admin::permission.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::permission.update',], [
//            'name' => 'admin::permission.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::permission.destroy',], [
//            'name' => 'admin::permission.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::permission.edit',], [
//            'name' => 'admin::permission.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:admin::refresh-csrf',], [
//            'name' => 'admin::refresh-csrf',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:password.confirm',], [
//            'name' => 'password.confirm',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:dashboard',], [
//            'name' => 'dashboard',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:verification.send',], [
//            'name' => 'verification.send',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:verification.notice',], [
//            'name' => 'verification.notice',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:verification.verify',], [
//            'name' => 'verification.verify',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:password.request',], [
//            'name' => 'password.request',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:password.email',], [
//            'name' => 'password.email',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:login',], [
//            'name' => 'login',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:logout',], [
//            'name' => 'logout',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::',], [
//            'name' => 'news::',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::api.article.index',], [
//            'name' => 'news::api.article.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::api.author.index',], [
//            'name' => 'news::api.author.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::api.message.index',], [
//            'name' => 'news::api.message.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::article.store',], [
//            'name' => 'news::article.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::article.index',], [
//            'name' => 'news::article.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::article.create',], [
//            'name' => 'news::article.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::article.show',], [
//            'name' => 'news::article.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::article.update',], [
//            'name' => 'news::article.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::article.destroy',], [
//            'name' => 'news::article.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::article.edit',], [
//            'name' => 'news::article.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::author.index',], [
//            'name' => 'news::author.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::author.store',], [
//            'name' => 'news::author.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::author.create',], [
//            'name' => 'news::author.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::author.show',], [
//            'name' => 'news::author.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::author.destroy',], [
//            'name' => 'news::author.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::author.update',], [
//            'name' => 'news::author.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::author.edit',], [
//            'name' => 'news::author.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::message.index',], [
//            'name' => 'news::message.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::message.store',], [
//            'name' => 'news::message.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::message.create',], [
//            'name' => 'news::message.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::message.show',], [
//            'name' => 'news::message.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::message.update',], [
//            'name' => 'news::message.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::message.destroy',], [
//            'name' => 'news::message.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:news::message.edit',], [
//            'name' => 'news::message.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:register',], [
//            'name' => 'register',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:password.update',], [
//            'name' => 'password.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:password.reset',], [
//            'name' => 'password.reset',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::',], [
//            'name' => 'system::',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::articles.store',], [
//            'name' => 'system::articles.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::articles.index',], [
//            'name' => 'system::articles.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::articles.create',], [
//            'name' => 'system::articles.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::articles.update',], [
//            'name' => 'system::articles.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::articles.destroy',], [
//            'name' => 'system::articles.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::articles.show',], [
//            'name' => 'system::articles.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::articles.edit',], [
//            'name' => 'system::articles.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::',], [
//            'name' => 'system::',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::users.index',], [
//            'name' => 'system::users.index',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::users.store',], [
//            'name' => 'system::users.store',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::users.create',], [
//            'name' => 'system::users.create',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::users.update',], [
//            'name' => 'system::users.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::users.show',], [
//            'name' => 'system::users.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::users.destroy',], [
//            'name' => 'system::users.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:system::users.edit',], [
//            'name' => 'system::users.edit',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:two-factor.login',], [
//            'name' => 'two-factor.login',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:current-user.destroy',], [
//            'name' => 'current-user.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:password.confirm',], [
//            'name' => 'password.confirm',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:password.confirmation',], [
//            'name' => 'password.confirmation',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:other-browser-sessions.destroy',], [
//            'name' => 'other-browser-sessions.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:user-password.update',], [
//            'name' => 'user-password.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:profile.show',], [
//            'name' => 'profile.show',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:user-profile-information.update',], [
//            'name' => 'user-profile-information.update',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:current-user-photo.destroy',], [
//            'name' => 'current-user-photo.destroy',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:two-factor.disable',], [
//            'name' => 'two-factor.disable',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:two-factor.enable',], [
//            'name' => 'two-factor.enable',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:two-factor.qr-code',], [
//            'name' => 'two-factor.qr-code',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:two-factor.recovery-codes',], [
//            'name' => 'two-factor.recovery-codes',
//
//            'description' => 'guardar usuario'
//        ]);
//        Permission::firstOrCreate([
//            'slug' => 'route:verification.notice',], [
//            'name' => 'verification.notice',
//
//            'description' => 'guardar usuario'
//        ]);

        collect(array_keys(\Route::getRoutes()->getRoutesByName()))->each(function ($route) {
            Permission::firstOrCreate(['slug' => "route:{$route}"], ['name' => "route:{$route}"]);
        });
    }
}
