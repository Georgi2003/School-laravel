<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'first_name' => 'Петрю',
            'last_name' => 'Лимонъ',
            'age' => 99,
            'email' => 'pepi@abv.bg',
            'phone' => 888651523,
            'school_id' => 1,
        ]);
    }
}
