<?php

namespace Database\Seeders;

use App\Models\TopikEvent;
use Illuminate\Database\Seeder;

class TopikEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 10; $i++){
            TopikEvent::create([
                'nama_topik_event' => $faker->name,
            ]);
        }
    }
}
