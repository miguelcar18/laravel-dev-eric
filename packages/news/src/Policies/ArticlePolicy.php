<?php

namespace Packages\News\Policies;

use Packages\News\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;
use Packages\Admin\Models\User;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
//        return (($user->hasPermission('route:news::article.index') || $user->hasAnyGroup('news:admin','news:gerente','news:editor')) && $user->hasPermission('route:news::api.article.index'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        return (($user->hasPermission('route:news::article.index') || $user->hasAnyGroup('news:admin','news:gerente','news:editor')) && $user->hasPermission('route:news::api.article.index'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('route:news::article.create') || $user->hasAnyGroup('news:admin','news:editor');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        return (($user->hasAnyGroup('news:admin','news:gerente') || $user->hasPermission('route:news::message.update')) && $user->id == $article->author_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        return (($user->hasGroup('news:admin') || $user->hasPermission('route:news::article.destroy')) && $user->id == $article->author_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        return ($user->hasGroup('news:admin'));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        return ($user->hasGroup('news:admin'));
    }
}
