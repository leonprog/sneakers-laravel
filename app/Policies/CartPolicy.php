<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function CartDelete(?User $user,Cart $cart)
    {
        if (Auth::id() === $cart->user_id)
        {
            return Response::allow();
        }

        return Response::deny('Запрещенно');
    }
}
