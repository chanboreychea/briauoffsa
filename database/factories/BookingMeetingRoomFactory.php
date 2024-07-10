<?php

namespace Database\Factories;

use App\Enum\Department;
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
        $directedBy = [];
        $interOfficeOrDepartmental = [];
        $departments = Department::DEPARTMENTS;
        $directedBy[] = "ប្រធានអង្គភាព";
        $directedBy[] = "អនុប្រធានអង្គភាព";
        $interOfficeOrDepartmental[] = null;
        foreach ($departments as $key => $department) {
            $directedBy[] = "ប្រធាននាយកដ្ឋាន" . $key;
            $directedBy[] = "អនុប្រធាននាយកដ្ឋាន" . $key;
            foreach ($department as $key => $office) {
                $directedBy[] = "ប្រធានការិយាល័យ" . $office;
                $directedBy[] = "អនុប្រធានការិយាល័យ" . $office;
                $interOfficeOrDepartmental[] = $office;
            }
        }

        return [
            'date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'topicOfMeeting' => $this->faker->jobTitle(),
            'directedBy' => $this->faker->randomElement($directedBy),
            'nameDirectedBy' => $this->faker->name,
            'meetingLevel' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'regulator' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, null]),
            'interOfficeOrDepartmental' => $this->faker->randomElement($interOfficeOrDepartmental),
            'member' => $this->faker->randomNumber(2),
            'room' => $this->faker->randomElement(['A', 'B']),
            'time' => $this->faker->randomElement(['A 7-8, A 8-9, A 9-10', 'B 7-8, B 8-9', "B 2-3, B 3-4, B 4-5", "A 2-3"]),
            'description' => Str::random(10),
            'isApprove' => 0
        ];
    }
}
