<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = [
            [
                'name' => 'Office Hour',
                'start_at' => '08:00:00',
                'end_at' => '16:00:00',
                'total_hours' => 8,
                'description' => 'Jam Office tidak ada lemburan jam',
            ],
            [
                'name' => 'Field Hour',
                'start_at' => '08:00:00',
                'end_at' => '16:00:00',
                'total_hours' => 8,
                'description' => 'Ready jam lembur',
            ],
            [
                'name' => 'Internship',
                'start_at' => '08:00:00',
                'end_at' => '14:00:00',
                'total_hours' => 6,
                'description' => 'Magang',
            ],
        ];
        collect($datas)->each(function ($data) {
            Shift::create($data);
        });
    }
}
