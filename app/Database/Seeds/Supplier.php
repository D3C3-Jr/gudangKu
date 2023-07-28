<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\SupplierModel;
use CodeIgniter\I18n\Time;

class Supplier extends Seeder
{
    public function run()
    {
        $suppliers = new SupplierModel();
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $suppliers->save(
                [
                    'kode_supplier'        =>    $faker->randomNumber(7, true),
                    'nama_supplier'       =>    $faker->company(),
                    'alamat'    =>    $faker->streetAddress(),
                    'kota'       =>    $faker->city(),
                    'telp'     =>    $faker->phoneNumber(),
                    'email'     =>    $faker->companyEmail(),
                    'jenis_supplier'     =>    $faker->word(),
                    'created_at'  =>    Time::createFromTimestamp($faker->unixTime()),
                    'updated_at'  =>    Time::now()
                ]
            );
        }
    }
}
