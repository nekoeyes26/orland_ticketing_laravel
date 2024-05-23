<?php

namespace Database\Seeders;

use App\Models\KategoriEvent;
use Illuminate\Database\Seeder;

class KategoriEventSeeder extends Seeder
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
            KategoriEvent::create([
                'nama_kategori_event' => $faker->name,
            ]);
        }
    }
}
