<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
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
            Event::create([
                'nama_event' => $faker->name,
                'id_format_event' => rand(1, 10),
                'id_topik_event' => rand(1, 10),
                'id_kategori_event' => rand(1, 10),
                'waktu_event' => $faker->dateTime(),
                'lokasi_provinsi_event' => "Jawa Tengah",
                'lokasi_kota_event' => "Semarang",
                'lokasi_detail_event' => $faker->sentence,
                'deskripsi_event' => $faker->sentence,
                'banner_event' => null,
                'status_event' => rand(0, 1),
                'email' => "bang@mail",
            ]);
        }
    }
}
