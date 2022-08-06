<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertandinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pertandingan')->insert([
            [
                'tanggal_pertandingan' => '2022-02-20',
                'waktu_pertandingan' => '13:00:00',
                'selesai_waktu_pertandingan' => '14:30:00',
                'tim_tuan_rumah' => "1",
                'tim_tamu' => '2',
            ],
            [
                'tanggal_pertandingan' => '2022-08-20',
                'waktu_pertandingan' => '10:00:00',
                'selesai_waktu_pertandingan' => '11:30:00',
                'tim_tuan_rumah' => "2",
                'tim_tamu' => '1',
            ]
        ]);
    }
}
