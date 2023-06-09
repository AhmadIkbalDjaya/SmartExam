<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'username' => 'student1',
                // 'password' => Hash::make('password1'),
                'password' => 'password1',
                'school_id' => 1,
                'name' => 'John Doe',
                'gender' => 'Laki-laki',
            ],
            [
                'username' => 'student2',
                // 'password' => Hash::make('password2'),
                'password' => 'password2',
                'school_id' => 1,
                'name' => 'Jane Smith',
                'gender' => 'Perempuan',
            ],
            [
                'username' => 'student3',
                // 'password' => Hash::make('password3'),
                'password' => 'password3',
                'school_id' => 1,
                'name' => 'Michael Johnson',
                'gender' => 'Laki-laki',
            ],
            [
                'username' => 'student4',
                // 'password' => Hash::make('password4'),
                'password' => 'password4',
                'school_id' => 2,
                'name' => 'Emily Anderson',
                'gender' => 'Perempuan',
            ],
            [
                'username' => 'student5',
                // 'password' => Hash::make('password5'),
                'password' => 'password5',
                'school_id' => 2,
                'name' => 'David Lee',
                'gender' => 'Laki-laki',
            ],
        ];
        foreach ($students as $studentData) {
            Student::create($studentData);
        }
    }
}
