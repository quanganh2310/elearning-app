<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        if (!$user) {
            User::create([
                'role' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'teacher',
                'name' => 'Teacher',
                'email' => 'teacher@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student 2',
                'email' => 'student2@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student 3',
                'email' => 'student3@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student 4',
                'email' => 'student4@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
        }
    }
}
