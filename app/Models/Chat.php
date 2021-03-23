<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participant_id_1',
        'participant_id_2'
    ];

    public function participant_1(): BelongsTo
    {
        return $this->belongsTo(User::class, 'participant_1_id');
    }

    public function participant_2(): BelongsTo
    {
        return $this->belongsTo(User::class, 'participant_2_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
