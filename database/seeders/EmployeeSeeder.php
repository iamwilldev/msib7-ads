<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_number = ['IP06001', 'IP06002', 'IP06003', 'IP06004', 'IP06005', 'IP06006', 'IP06007', 'IP06008', 'IP06009', 'IP06010'];
        $employee_name = ['Agus', 'Amin', 'Yusuf', 'Alyssa', 'Maulana', 'Agfika', 'James', 'Octavanus', 'Nugroho', 'Raisa'];
        $employee_address = ['Jln Gaja Mada no 12, Surabaya', 'Jln Imam Bonjol no 11, Mojokerto', 'Jln A Yani Raya 15 No 14 Malang', 'Jln Bungur Sari V no 166, Bandung', 'Jln Candi Agung, No 78 Gg 5, Jakarta', 'Jln Nangka, Jakarta Timur', 'Jln Merpati, 8 Surabaya', 'Jln A Yani 17, B 08 Sidoarjo', 'Jln Duren tiga 167, Jakarta Selatan', 'Jln Kelapa Sawit, Jakarta Selatan'];
        $employee_date_of_birth = ['1980-01-11', '1977-09-03', '1973-08-09', '1983-03-18', '1978-11-10', '1979-02-07', '1989-05-18', '1985-04-14', '1984-01-01', '1990-12-17'];
        $employee_date_of_hire = ['2005-08-07', '2005-08-07', '2006-08-07', '2006-09-06', '2006-09-10', '2007-01-02', '2007-04-04', '2007-05-19', '2008-01-16', '2008-08-16'];

        for ($i = 0; $i < 10; $i++) {
            Employee::create([
                'employee_number' => $employee_number[$i],
                'name' => $employee_name[$i],
                'address' => $employee_address[$i],
                'date_of_birth' => $employee_date_of_birth[$i],
                'date_of_hire' => $employee_date_of_hire[$i],
            ]);
        }
    }
}
