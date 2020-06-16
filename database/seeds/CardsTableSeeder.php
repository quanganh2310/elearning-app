<?php

use App\Card;
use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            Card::create([
                'seri_number' => rand(100000, 999999),
                'value' => rand(1000, 10000)
            ]);
        }
    }
}
