<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','city','address','pincode','role_id','wallet_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role() {
        return $this->belongsTo('App\Role');
    }
    public function carts() {
        return $this->hasMany('App\Cart');
    }
    public function whishlists() {
        return $this->hasMany('App\Whishlist');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    public function purchasers()
    {
        return $this->hasMany('App\Purchaser');
    }
    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
}
