<?php

namespace App\Policies;

use App\Models\Orders\DeliveryType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Orders\DeliveryType  $deliveryType
     * @return mixed
     */
    public function view(User $user, DeliveryType $deliveryType)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Orders\DeliveryType  $deliveryType
     * @return mixed
     */
    public function update(User $user, DeliveryType $deliveryType)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Orders\DeliveryType  $deliveryType
     * @return mixed
     */
    public function delete(User $user, DeliveryType $deliveryType)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Orders\DeliveryType  $deliveryType
     * @return mixed
     */
    public function restore(User $user, DeliveryType $deliveryType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Orders\DeliveryType  $deliveryType
     * @return mixed
     */
    public function forceDelete(User $user, DeliveryType $deliveryType)
    {
        //
    }
}
