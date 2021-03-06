<?php

namespace App\Policies;

use App\User;
use App\Wish;
use Illuminate\Auth\Access\HandlesAuthorization;

class WishPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the wish.
     *
     * @param  \App\User  $user
     * @param  \App\Wish  $wish
     * @return mixed
     */
    public function view(?User $user, Wish $wish)
    {
        return true;
    }

    /**
     * Determine whether the user can create wishes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user;
    }

    /**
     * Determine whether the user can update the wish.
     *
     * @param  \App\User  $user
     * @param  \App\Wish  $wish
     * @return mixed
     */
    public function update(User $user, Wish $wish)
    {
        //
    }

    /**
     * Determine whether the user can delete the wish.
     *
     * @param  \App\User  $user
     * @param  \App\Wish  $wish
     * @return mixed
     */
    public function delete(User $user, Wish $wish)
    {
        return $user->id === $wish->user_id;
    }

    /**
     * Determine whether the user can restore the wish.
     *
     * @param  \App\User  $user
     * @param  \App\Wish  $wish
     * @return mixed
     */
    public function restore(User $user, Wish $wish)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the wish.
     *
     * @param  \App\User  $user
     * @param  \App\Wish  $wish
     * @return mixed
     */
    public function forceDelete(User $user, Wish $wish)
    {
        //
    }

    /**
     * Determine whether the user can offer to fulfill a wish.
     *
     * @param  \App\User  $user
     * @param  \App\Wish  $wish
     * @return mixed
     */
    public function fulfill(User $user, Wish $wish)
    {
        if ($user->id === $wish->user_id) {
            return false;
        }

        if ($wish->fulfillments->contains('giver_id', $user->id)) {
            return false;
        }

        if ($wish->fulfilled) {
            return false;
        }

        return true;
    }
}
