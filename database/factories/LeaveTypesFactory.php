<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveTypes>
 */
class LeaveTypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->unique()->randomElement(['Sick Leave', 'Casual Leave', 'Public Holiday', 'Religious Holiday', 'Maternity Leave', 'Paternity Leave']),
        ];
    }
}
