<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Outlet extends Model
{
    protected $table = '_outlets';
    protected $fillable = ['name', 'contact', 'email', 'address', 'city', 'postcode'];   

    public function orders(){
        return $this->hasMany(Order::class, 'outlet_id');
    }
}
