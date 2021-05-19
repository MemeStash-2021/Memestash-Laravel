<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardNl extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'cards_nl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    protected $hidden = ['laravel_through_key'];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
