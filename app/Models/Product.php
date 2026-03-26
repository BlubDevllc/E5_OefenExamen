<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'maker_id',
        'naam',
        'beschrijving',
        'prijs',
        'status',
        'is_deleted',
    ];

    protected $casts = [
        'prijs' => 'decimal:2',
        'is_deleted' => 'boolean',
    ];

    public function maker()
    {
        return $this->belongsTo(User::class, 'maker_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
