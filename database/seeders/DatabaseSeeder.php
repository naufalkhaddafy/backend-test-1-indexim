<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShiftSeeder::class,
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'test@example.com',
            'role' => true,
            'nrp' => '13028',
            'password' => Hash::make('admin'),
        ]);

         User::create([
            'name' => 'naufal',
            'username' => 'naufal',
            'email' => 'naufal@example.com',
            'nrp' => '13021',
            'position' => 'Programmer',
            'department' => 'IT',
            'password' => Hash::make('naufal'),
        ]);

        User::factory(10)->create();

        Attendance::factory(50)->create();
    }
}
