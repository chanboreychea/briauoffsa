<?php

namespace Database\Factories;

use App\Enum\Department;
use App\Enum\MeetingLevel;
use App\Enum\Regulator;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingMeetingRoom>
 */
class BookingMeetingRoomFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeThisMonth(),
            'topicOfMeeting' => $this->faker->name,
            'directedBy' => Str::random(10),
            'nameDirectedBy' => Str::random(10),
            'meetingLevel' => $this->faker->randomElement(MeetingLevel::MEETING_LEVEL),
            'regulator' => $this->faker->randomElement(Regulator::REGULATOR, null),
            'interOfficeOrDepartmental' => $this->faker->randomElement(Department::DEPARTMENTS['កិច្ចការទូទៅ'], null),
            'member' => $this->faker->randomNumber(2),
            'room' => $this->faker->randomElement(['A', 'B']),
            'time' => $this->faker->randomElement(['A 7-8, A 8-9', 'B 7-8, B 8-9', "B 2-3", "A 2-3"]),
            'description' => Str::random(10),
            'isApprove' => 0
        ];
    }
}
