<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'school_name' => 'SMP ABC',
            'school_category' => 'SMP',
        ]);

        School::create([
            'school_name' => 'SMA XYZ',
            'school_category' => 'SMA',
        ]);

        School::create([
            'school_name' => 'SMP QWERTY',
            'school_category' => 'SMP',
        ]);

        School::create([
            'school_name' => 'SMA ASDF',
            'school_category' => 'SMA',
        ]);

        School::create([
            'school_name' => 'SMP ZXC',
            'school_category' => 'SMP',
        ]);
    }
}
