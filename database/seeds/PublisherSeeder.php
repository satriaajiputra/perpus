<?php

use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        $publisher = new \App\Models\Publisher;
        $book = new \App\Models\Publisher;

        for($a = 1; $a <= 10; $a++) {
            $data = $publisher->create([
                'nama' => $faker->company,
                'alamat' => $faker->address,
            ]);
        }
    }
}
