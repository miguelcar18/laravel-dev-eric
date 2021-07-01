<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Packages\News\Models\Article;
use Packages\News\Models\Author;
use Packages\News\Models\Message;
use Packages\News\Policies\ArticlePolicy;
use Packages\News\Policies\AuthorPolicy;
use Packages\News\Policies\MessagePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Article::class => ArticlePolicy::class,
        Author::class => AuthorPolicy::class,
        Message::class => MessagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
