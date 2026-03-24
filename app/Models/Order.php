<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'koper_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'maker_id');
    }
}
