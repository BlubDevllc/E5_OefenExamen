<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
public function maker()
{
    return $this->belongsTo(User::class, 'maker_id');
}

public function reviews()
{
    return $this->hasMany(Review::class);
}
}
