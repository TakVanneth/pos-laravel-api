<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the given user.
     *
     * @param  \App\Models\User  $authUser
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $authUser->role === 'admin';
    }
}
