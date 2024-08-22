<?php

namespace Database\Seeders;

use App\Models\Cuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_number = ['IP06001', 'IP06001', 'IP06006', 'IP06007', 'IP06004', 'IP06003'];
        $start_date = ['2024-08-02', '2024-08-18', '2024-08-19', '2024-08-23', '2024-08-29', '2024-08-30'];
        $duration = [2, 2, 1, 1, 5, 2];
        $reason = ['Acara Keluarga', 'Anak Sakit', 'Nenek Sakit', 'Sakit', 'Menikah', 'Acara Keluarga'];

        for ($i = 0; $i < 6; $i++) {
            Cuti::create([
                'employee_id' => \App\Models\Employee::where('employee_number', $employee_number[$i])->first()->id,
                'start_date' => $start_date[$i],
                'duration' => $duration[$i],
                'reason' => $reason[$i],
            ]);
        }
    }
}
