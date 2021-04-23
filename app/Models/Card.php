<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'description',
        'likes',
        'views'
    ];

    protected $hidden = ['laravel_through_key'];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'card_id');
    }
}
