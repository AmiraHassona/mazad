<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function coupon_usages()
    {
        return $this->hasMany(CouponUsage::class);
    }
}
