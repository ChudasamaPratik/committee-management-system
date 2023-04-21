<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'committee_id' => $this->faker->numberBetween(1, 10),
            'venue' => $this->faker->sentence(5),
            'meeting_time' => $this->faker->date(),
            'is_completed' => $this->faker->boolean(),
        ];
    }
}
