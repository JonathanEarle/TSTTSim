<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view Order.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function view(User $user, Phone $phone)
    {
        return $user->id===$order->user_id;
    }

    /**
     * Determine whether the user can create any Order.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update any Order.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $order
     * @return mixed
     */
    public function update(User $user,Order $order)
    {
        return $user->id===$order->user_id;
    }

    /**
     * Determine whether the user can delete any Order.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $order
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->id===$order->user_id;
    }
}
