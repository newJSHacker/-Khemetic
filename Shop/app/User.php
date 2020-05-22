<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public function userCart(){

        $carts = \App\user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
            ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
            ->groupBy('img.item_code')
            ->where('user_temp_order_id', $this->id)
            ->get();

        return $carts;
    }


    public static function userCartSession(){

        $carts = \App\user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                    ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
                    ->groupBy('img.item_code')
                    ->where('cookie', \Illuminate\Support\Facades\Cookie::get('laravel_session'))
                    ->get();

        return $carts;
    }



    public function isAdmin(){
        return false;
    }


}
