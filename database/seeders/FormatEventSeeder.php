<?php

namespace Database\Seeders;

use App\Models\FormatEvent;
use Illuminate\Database\Seeder;

class FormatEventSeeder extends Seeder
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
            FormatEvent::create([
                'nama_format_event' => $faker->name,
            ]);
        }
    }
}
