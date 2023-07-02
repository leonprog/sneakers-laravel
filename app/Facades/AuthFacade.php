<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $data)
 * @method static login(array $data)
 * @method static redirect(string $provider)
 * @method static handleCallback(string $provider)
 * @method static home()
 *
 * @see \App\Services\AuthService
 */
class AuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auth.facade';
    }
}
