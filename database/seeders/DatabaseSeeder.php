<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\SchoolSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\QuizStudentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(SchoolSeeder::class);
        // $this->call(TeacherSeeder::class);
        // $this->call(StudentSeeder::class);
        // $this->call(QuizStudentSeeder::class);
        User::create([
            "username" => "momentum",
            "password" => bcrypt('momentumx'),
            "email" => "momentum066@gmail.com",
        ]);
        User::create([
            "username" => "momentum1",
            "password" => bcrypt('momentumx1'),
            "email" => "momentum066@gmail.com",
        ]);
        User::create([
            "username" => "momentum2",
            "password" => bcrypt('momentumx2'),
            "email" => "momentum066@gmail.com",
        ]);
        User::create([
            "username" => "momentum3",
            "password" => bcrypt('momentumx3'),
            "email" => "momentum066@gmail.com",
        ]);
        User::create([
            "username" => "momentum4",
            "password" => bcrypt('momentumx4'),
            "email" => "momentum066@gmail.com",
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
