<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static store(array $data)
 * @method static delete(array $data)
 * @method static clear()
 *
 * @see \App\Services\CartService
 */
class CartFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cart.facade';
    }
}
