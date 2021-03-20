<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed|string name
 * @property mixed|string email
 * @property mixed password
 * @method static select(string[] $array)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at',
        'created_at',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'wallet' => 800,
    ];

    public function collection(): HasOne
    {
        return $this->hasOne(Collection::class, 'user_id');
    }

    public function card(): HasManyThrough
    {
        return $this->hasManyThrough(Card::class, Collection::class, 'id', 'card_id', 'id', 'user_id');
    }

    public function chat(): HasMany
    {
        $this->hasMany(Chat::class, 'participant_id_1');
        return $this->hasMany(Chat::class, 'participant_id_2');
    }

    public function message(): HasMany
    {
        return $this->hasMany(Message::class, 'user_id');
    }
}
