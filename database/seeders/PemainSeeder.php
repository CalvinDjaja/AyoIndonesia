<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemain_detail')->insert([
            [
                'nama' => 'Bernd Leno',
                'tinggi_badan' => '189',
                'berat_badan' => "80",
                'posisi_pemain' => 'Penjaga Gawang',
                'nomor_punggung' => '1',
                'tim_detail_id' => '1',
            ],
            [
                'nama' => 'Héctor Bellerín',
                'tinggi_badan' => '180',
                'berat_badan' => "82",
                'posisi_pemain' => 'Bertahan',
                'nomor_punggung' => '2',
                'tim_detail_id' => '1',
            ],
            [
                'nama' => 'Timo Werner',
                'tinggi_badan' => '179',
                'berat_badan' => "74",
                'posisi_pemain' => 'Penyerang',
                'nomor_punggung' => '11',
                'tim_detail_id' => '2',
            ],
            [
                'nama' => 'Mason Mount',
                'tinggi_badan' => '175',    
                'berat_badan' => "78",
                'posisi_pemain' => 'Gelandang',
                'nomor_punggung' => '19',
                'tim_detail_id' => '2',
            ],
        ]);
    }
}
