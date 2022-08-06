<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tim_detail')->insert([
            [
                'nama' => 'Arsenal',
                'logo' => 'Arsenal.jpg',    
                'tahun_berdiri' => "1886-10-01",
                'alamat_markas' => 'Emirates Stadium',
                'kota_markas' => 'Islington, London, England'
            ],
            [
                'nama' => 'Chelsea',
                'logo' => 'Chelsea.jpg',
                'tahun_berdiri' => "1905-03-10",
                'alamat_markas' => 'Stamford Bridge',
                'kota_markas' => 'Fullham, London, England'
            ]
        ]);
    }
}
