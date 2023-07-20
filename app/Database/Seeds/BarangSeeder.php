<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\BarangModel;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $barangs = new BarangModel();
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 200; $i++) {
            $barangs->save(
                [
                    'id_supplier'        =>    $faker->randomNumber(2, true),
                    'kode_barang'       =>    $faker->randomNumber(7, true),
                    'nama_barang'       =>    $faker->randomNumber(7, true),
                    'jenis_barang'    =>    $faker->word(),
                    'created_at'  =>    Time::createFromTimestamp($faker->unixTime()),
                    'updated_at'  =>    Time::now()
                ]
            );
        }
    }
}
