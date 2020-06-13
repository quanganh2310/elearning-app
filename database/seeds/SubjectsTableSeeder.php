<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'name' => 'Mathematics'
        ]);
        Subject::create([
            'name' => 'Robotics'
        ]);
        Subject::create([
            'name' => 'Psychology'
        ]);
        Subject::create([
            'name' => 'Business Law'
        ]);
        Subject::create([
            'name' => 'Network & Security'
        ]);
        Subject::create([
            'name' => 'Financial Analysis'
        ]);
        Subject::create([
            'name' => 'Graphic Design'
        ]);
        Subject::create([
            'name' => 'Digital Marketing'
        ]);
    }
}
