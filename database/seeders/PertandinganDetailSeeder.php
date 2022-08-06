<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertandinganDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pertandingan_detail')->insert([
            [
                'rumah_skor'      => '1',	
                'tamu_skor'       => '0',
                'pemain_pencentak_gol'  => '1',
                'pertandingan_id'       => '1',
                'waktu_gol'             => '13:30:00',
            ],
            [
                'rumah_skor'      => '1',	
                'tamu_skor'       => '1',
                'pemain_pencentak_gol'  => '3',
                'pertandingan_id'       => '1',
                'waktu_gol'             => '13:50:00',
            ],
            [
                'rumah_skor'      => '2',	
                'tamu_skor'       => '1',
                'pemain_pencentak_gol'  => '1',
                'pertandingan_id'       => '1',
                'waktu_gol'             => '14:10:00',
            ]
        ]);
    }
}
