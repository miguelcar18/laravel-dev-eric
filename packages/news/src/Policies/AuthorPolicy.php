<?php

namespace Packages\News\Policies;

use Packages\News\Models\Author;
use Illuminate\Auth\Access\HandlesAuthorization;
use Packages\Admin\Models\User;

class AuthorPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return mixed
     */
    public function view(User $user, Author $author)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('route:news::author.create') || $user->hasAnyGroup('news:admin','news:editor');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return mixed
     */
    public function update(User $user, Author $author)
    {
        return (($user->hasAnyGroup('news:admin','news:gerente') || $user->hasPermission('route:news::author.update')) && $user->id == $author->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return mixed
     */
    public function delete(User $user, Author $author)
    {
        return (($user->hasGroup('news:admin') || $user->hasPermission('route:news::author.destroy')) && $user->id == $author->id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return mixed
     */
    public function restore(User $user, Author $author)
    {
        return ($user->hasGroup('news:admin'));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Packages\Admin\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return mixed
     */
    public function forceDelete(User $user, Author $author)
    {
        return ($user->hasGroup('news:admin'));
    }
}
