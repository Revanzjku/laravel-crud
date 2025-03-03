<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++) {
            DB::table('mahasiswa')->insert([
                'nama'=> $faker->name,
                'nim'=> $faker->unique()->numerify('10######'),
                'alamat'=> $faker->address
            ]);
        }
    }
}
