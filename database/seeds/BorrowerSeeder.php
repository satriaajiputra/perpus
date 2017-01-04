<?php

use Illuminate\Database\Seeder;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        $student = \App\Models\Student::select('id')->take(5)->get();
        $book = \App\Models\Book::select('id')->take(5)->get();

        for($a = 1; $a <= 10; $a++) {
            $student[rand(0,4)]->borrowers()->create([
                'book_id' => $book[rand(0,4)]->id,
                'tgl_pinjam' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
                'tgl_kembali' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'kode_pinjam' => 'PERPUS-'.time(),
            ]);
        }
    }
}
