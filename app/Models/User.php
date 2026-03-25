<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'biografie', 'contact_info', 'krediet', 'is_verified', 'is_blocked'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
        public function products()
    {
        return $this->hasMany(Product::class, 'maker_id');
    }

    public function ordersAsBuyer()
    {
        return $this->hasMany(Order::class, 'koper_id');
    }

    public function ordersAsSeller()
    {
        return $this->hasMany(Order::class, 'maker_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
