<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $fillable = [
        'bookingId',
        'name',
        'position',
        'phoneNumber',
        'email',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(BookingMeetingRoom::class, 'bookingId');
    }
}
