<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BookingMeetingRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bookingId' => BookingMeetingRoom::factory(),
            'name' => $this->faker->name,
            'position' => Str::random(10),
            'email' => $this->faker->unique()->safeEmail,
            'phoneNumber' => $this->faker->unique()->phoneNumber(),
        ];
    }
}
