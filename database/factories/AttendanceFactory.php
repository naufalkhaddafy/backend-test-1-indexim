<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'start_at' => fake()->time(),
            'end_at' => fake()->time(),
            'description' =>fake()->randomElement(['Hadir', 'Izin', 'Sakit', 'Tidak Hadir']),
            'total_primary' => fake()->randomNumber(1),
            'total_overtime' => fake()->randomNumber(1),

        ];
    }
}
