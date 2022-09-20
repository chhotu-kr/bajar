<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderItem(){
        return $this->hasMany(orderItem::class,"order_id","id");
    }

    public function payment(){
        return $this->hasOne(Payment::class,"order_id","id");
    }
    public function coupan(){
        return $this->hasOne(coupan::class,"id","coupan_id");
    }
}
