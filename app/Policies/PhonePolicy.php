<?php

namespace App\Policies;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determines if the user is authorized for all actions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function before($user, $ability)
    {
        if($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view Phones.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function view(?User $user, Phone $phone)
    {
        return true;
    }

    /**
     * Determine whether the user can create any Phones.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update any Phone.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete any Phone.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->isAdmin();
    }
}
