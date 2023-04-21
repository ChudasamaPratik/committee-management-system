<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Committee>
 */
class CommitteeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->boolean(),
            'name' => $this->faker->sentence(3),
            'short_name' => $this->faker->unique()->sentence(1),
            'effect_date' => $this->faker->date(),
            'restructuring_date' => $this->faker->date(),
            'meeting_frequency' => $this->faker->numberBetween(1, 7)
        ];
    }
}
