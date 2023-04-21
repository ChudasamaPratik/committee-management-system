<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::find($this->faker->unique()->numberBetween(1, 30));

        return [
            'user_id' => $user->id,
            'name' => $user->name,
            'type' => $this->faker->boolean(),
            'designation' => $this->faker->sentence(3),
            'department' => $this->faker->sentence(2),
            'organization' => $this->faker->sentence(2),
            'email' => $user->email,
            'mobile' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
