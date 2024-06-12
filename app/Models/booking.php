<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'room_id', 'start_date', 'end_date', 'status'];

    /**
     * The users that belong to the booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The rooms that belong to the booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
