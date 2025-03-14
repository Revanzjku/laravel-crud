<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++) {
            DB::table('pegawai')->insert([
                'pegawai_nama'=> $faker->name,
                'pegawai_jabatan'=> $faker->jobTitle,
                'pegawai_umur'=> $faker->numberBetween(17, 30),
                'pegawai_alamat'=> $faker->address
            ]);
        }
    }
}
