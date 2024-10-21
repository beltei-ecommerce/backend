<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'image',
        'password',
        'disable'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Store or update User
    public static function storeUser($request, $id = null)
    {
        $user = $request->only(['first_name', 'last_name', 'gender', 'email', 'password', 'disable']);
        $user = self::updateOrCreate(['id' => $id], $user);
        return $user;
    }

    // Check user existed
    public static function contains($field, $value)
    {
        return self::contains($field, $value);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'fk_user_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'fk_user_id', 'id');
    }
}
