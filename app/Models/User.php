<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'yandex_id',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): HasMany
    {
        return $this->hasMany(RoleUser::class,'user_id', 'id');
    }

//    public function carts()
//    {
//        return $this->hasMany(Cart::class)->select('id','user_id','product_id', 'quantity');
//    }

    public function carts()
    {
        return $this->belongsToMany(Product::class, 'carts')->withPivot('id as cart_id','quantity')->select('products.id', 'title', 'price', 'category_id');
    }

    public function hasCartProduct($id)
    {
        return $this->carts()->where('product_id', $id)->exists();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

}
