<?php

namespace Database\Seeders;

use App\Models\BookingMeetingRoom;
use App\Models\Guest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $booking = BookingMeetingRoom::all();
        foreach ($booking as $item) {
            Guest::factory()->count(50)->create([
                'bookingId' => $item->id
            ]);
        }
    }
}
