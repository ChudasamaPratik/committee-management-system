<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'meeting_id' => $this->faker->numberBetween(1, 10),
            'agenda_order' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->sentence(3),
            'discussion' => $this->faker->sentence(8),
            // 'resolution' => $this->faker->sentence(7),
            'resolution' => $this->faker->boolean(60) ? $this->faker->sentence(7) : null,
            'action' => $this->faker->sentence(8),
        ];
    }
}
