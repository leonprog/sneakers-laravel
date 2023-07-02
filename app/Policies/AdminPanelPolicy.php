<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class AdminPanelPolicy
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

    public function viewAdminPanel(?User $user)
    {
        if ($user->roles->containsStrict('role_id', 2)) {
            return Response::allow();
        }
        return Response::deny('Запрещенно');
    }

}
