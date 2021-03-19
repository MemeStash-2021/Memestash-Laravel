<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'picture',
        'price',
        'description'
    ];

    /**
     * Defines the relationships to other models
     */
    public function collection(){
        return $this->belongsTo(Collection::class, 'card_id');
    }
}
