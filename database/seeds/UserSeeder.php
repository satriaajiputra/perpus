<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        $user = new \App\Models\User;
        // admin
        $user->create([
            'name' => 'Satria Aji Putra',
            'username' => 'satmaxt',
            'password' => bcrypt('123'),
            'is_admin' => true,
            'is_member' => false,
        ]);

        $user->create([
            'name' => 'Hilman Fauzi',
            'username' => 'hilmanfau',
            'password' => bcrypt('123'),
            'is_admin' => true,
            'is_member' => false,
        ]);

        // siswa
        for($a = 1; $a <= 10; $a++) {
            $data = $user->create([
                'name' => $faker->name,
                'username' => $faker->username,
                'password' => bcrypt('123'),
            ]);

            $data->student()->create([
                'kelas' => rand(10,12),
                'telp' => $faker->phoneNumber,
                'alamat' => $faker->address,
            ]);
        }
    }
}
