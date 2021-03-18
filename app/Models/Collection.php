<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

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
        return $this->belongsTo('App\User', 'user_id');
    }

    public function card(){
        return $this->hasMany('App\Card', 'id', 'card_id');
    }
}
