<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'card_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function card(){
        return $this->hasMany(Card::class, 'id', 'card_id');
    }
}
