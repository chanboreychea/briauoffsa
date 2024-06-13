<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingMeetingRoom extends Model
{
    use HasFactory;
    protected $table = 'booking_meeting_rooms';
    protected $fillable = [
        'date',
        'topicOfMeeting',
        'directedBy',
        'nameDirectedBy',
        'meetingLevel',
        'regulator',
        'interOfficeOrDepartmental',
        'member',
        'room',
        'time',
        'description',
        'bookingReason',
        'isApprove'
    ];

    public function guest(): HasOne
    {
        return $this->hasOne(Guest::class, "bookingId");
    }
}
