<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        $data = \App\Models\Publisher::take(5)->get();

        for($b = 1; $b <= 5; $b++) {
            $data[rand(0,4)]->books()->create([
                'judul_buku' => $faker->realText($maxNbChars = 15),
                'kode_buku' => $faker->isbn10,
            ]);
        }
    }
}
