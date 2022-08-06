<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimModel;
use App\Models\PemainModel;
use App\Models\PertandinganModel;
use App\Models\PertandinganDetailModel;
use App\Models\HasilPertandinganModel;

date_default_timezone_set('Asia/Jakarta');

class apicontroller extends Controller
{
    //tim
    public function get_all_tim(){
        return response()->json(TimModel::all(), 200);
    }
    public function insert_data_tim(Request $request){
        $request->validate([
            'nama' => 'required|unique:tim_detail',
            'logo' => 'required',
        ]);
        $insert_tim                 = new TimModel;
        $insert_tim->nama           = $request->nama;
        $insert_tim->logo           = $request->logo;
        $insert_tim->tahun_berdiri  = $request->tahunBerdiri;
        $insert_tim->alamat_markas  = $request->alamatMarkas;
        $insert_tim->kota_markas    = $request->kotaMarkas;
        $insert_tim->save();
        return response([
            'status' => 'Ok',
            'message' => 'Tim Disimpan',
            'data' => $insert_tim
        ], 200);
    }
    public function update_data_tim(Request $request, $id){
        $check_data = TimModel::firstWhere('id', $id);
        if($check_data){
            $request->validate([
                'nama' => 'required|unique:tim_detail',
                'logo' => 'required',
            ]);
            $data_tim = TimModel::find($id);    
            $data_tim->nama           = $request->nama;
            $data_tim->logo           = $request->logo;
            $data_tim->tahun_berdiri  = $request->tahunBerdiri;
            $data_tim->alamat_markas  = $request->alamatMarkas;
            $data_tim->kota_markas    = $request->kotaMarkas;
            $data_tim->save();
            return response([
                'status' => 'Ok',
                'message' => 'Tim Berhasil Diubah',
                'data' => $data_tim
            ], 200);
        }
        else{
            return response([
                'status' => 'Not Found',
                'message' => 'Tim Tidak Ditemukan',
            ], 404);
        }
    }
    public function delete_data_tim($id){
        $check_data = TimModel::firstWhere('id', $id);
        if($check_data){
            $data_tim = TimModel::find($id);
            $data_tim->delete();
            return response([
                'status' => 'Ok',
                'message' => 'Tim Berhasil Dihapus',
                'data' => $data_tim
            ], 200);
        }
        else{
            return response([
                'status' => 'Not Found',
                'message' => 'Tim Tidak Ditemukan',
            ], 404);
        }
    }
    public function restore_data_tim($id){
        $check_data = TimModel::onlyTrashed()->firstWhere('id', $id);
        if($check_data){
            $data_tim = TimModel::onlyTrashed()->where('id',$id);
            $data_tim->restore();
            $data_tim = TimModel::find($id);
            return response([
                'status' => 'Ok',
                'message' => 'Tim Berhasil Dikembalikan',
                'data' => $data_tim
            ], 200);
        }
        else{
            return response([
                'status' => 'Not Found',
                'message' => 'Tim Tidak Ditemukan',
            ], 404);
        }
    }


    //pemain
    public function get_all_pemain(){
        return response()->json(PemainModel::all(), 200);
    }
    public function get_pemain($id)
    {   
        $tim = TimModel::firstWhere('id', $id);
        $pemain = PemainModel::where('tim_detail_id',$id)->get();
        return response([
            'Tim' => $tim['nama'],
            'pemain' => $pemain
        ], 200);
    }
    public function insert_data_pemain(Request $request){
        $request->validate([
            'nama' => 'required|unique:tim_detail',
        ]);
        $insert_pemain                 = new PemainModel;
        $insert_pemain->nama           = $request->nama;
        $insert_pemain->tinggi_badan   = $request->tinggiBadan;
        $insert_pemain->berat_badan    = $request->beratBadan;
        $insert_pemain->posisi_pemain  = $request->posisiPemain;
        $insert_pemain->nomor_punggung = $request->nomorPunggung;
        $insert_pemain->tim_detail_id  = $request->tim_detail_id;
        $insert_pemain->save();
        return response([
            'status' => 'Ok',
            'message' => 'Pemain Disimpan',
            'data' => $insert_pemain
        ], 200);
    }
    public function update_data_pemain(Request $request, $id){
        $check_data = PemainModel::firstWhere('id', $id);
        if($check_data){
            $request->validate([
                'nama' => 'required|unique:tim_detail',
            ]);
            $data_tim = PemainModel::find($id);    
            $data_tim->nama           = $request->nama;
            $data_tim->tinggi_badan   = $request->tinggiBadan;
            $data_tim->berat_badan    = $request->beratBadan;
            $data_tim->posisi_pemain  = $request->posisiPemain;
            $data_tim->nomor_punggung = $request->nomorPunggung;
            $data_tim->tim_detail_id  = $request->tim_detail_id;
            $data_tim->save();
            return response([
                'status' => 'Ok',
                'message' => 'Pemain Berhasil Diubah',
                'data' => $data_tim
            ], 200);
        }
        else{
            return response([
                'status' => 'Not Found',
                'message' => 'Tim Tidak Ditemukan',
            ], 404);
        }
    }
    public function delete_data_pemain($id){
        $check_data = PemainModel::firstWhere('id', $id);
        if($check_data){
            $data_pemain = PemainModel::find($id);
            $data_pemain->delete();
            return response([
                'status' => 'Ok',
                'message' => 'Tim Berhasil Dihapus',
                'data' => $data_pemain
            ], 200);
        }
        else{
            return response([
                'status' => 'Not Found',
                'message' => 'Tim Tidak Ditemukan',
            ], 404);
        }
    }
    public function restore_data_pemain($id){
        $check_data = PemainModel::onlyTrashed()->firstWhere('id', $id);
        if($check_data){
            $data_pemain = PemainModel::onlyTrashed()->where('id',$id);
            $data_pemain->restore();
            $data_pemain = PemainModel::find($id);
            return response([
                'status' => 'Ok',
                'message' => 'Tim Berhasil Dikembalikan',
                'data' => $data_pemain
            ], 200);
        }
        else{
            return response([
                'status' => 'Not Found',
                'message' => 'Tim Tidak Ditemukan',
            ], 404);
        }
    }


    //pertandingan
    public function get_all_pertandingan(){
        return response()->json(PertandinganModel::all(), 200);
    }
    public function insert_data_pertandingan(Request $request){
        $insert_pertandingan                        = new PertandinganModel;
        $insert_pertandingan->tanggal_pertandingan  = $request->tanggalPertandingan;
        $insert_pertandingan->waktu_pertandingan    = $request->waktuPertandingan;
        $insert_pertandingan->tim_tuan_rumah        = $request->timTuanRumah;
        $insert_pertandingan->tim_tamu              = $request->timTamu;
        $insert_pertandingan->save();
        return response([
            'status' => 'Ok',
            'message' => 'Pertandingan Disimpan',
            'data' => $insert_pertandingan
        ], 200);
    }

    //pertandingan detail
    public function get_all_pertandingan_detail(){
        return response()->json(PertandinganDetailModel::all(), 200);
    }
    public function insert_pertandingan_detail(Request $request){
        $insert_pertandingan_detail                         = new PertandinganDetailModel;
        $insert_pertandingan_detail->rumah_skor_akhir       = $request->rumahSkorAkhir;
        $insert_pertandingan_detail->tamu_skor_akhir        = $request->tamuSkorAkhir;
        $insert_pertandingan_detail->pemain_pencentak_gol   = $request->pemainPencentakGol;
        $insert_pertandingan_detail->waktu_gol              = $request->waktuGol;
        $insert_pertandingan_detail->pertandingan_id        = $request->pertandinganId;
        $insert_pertandingan_detail->save();
        return response([
            'status' => 'Ok',
            'message' => 'Pertandingan Detail Disimpan',
            'data' => $insert_pertandingan_detail
        ], 200);
    }

    //Hasil pertandingan detail
    public function get_hasil_pertandingan($id)
    {   
        $Hasil = HasilPertandinganModel::firstWhere('id', $id);
        return response($Hasil, 200);
    }
    public function update_hasil_pertandingan($pertandingan_id){
        $check_data = PertandinganModel::firstWhere('id', $pertandingan_id);
        $dataDetail = HasilPertandinganModel::firstWhere('pertandingan_id', $pertandingan_id);
        if($check_data['tanggal_pertandingan'] < date('Y-m-d') && $check_data['selesai_waktu_pertandingan'] < date("H:i:s") && !$dataDetail){
            $dataDetail = PertandinganDetailModel::where('pertandingan_id', $pertandingan_id)->latest()->first();
            $insert_pertandingan_detail                             = new HasilPertandinganModel;
            $insert_pertandingan_detail->rumah_skor_akhir           = $dataDetail['rumah_skor_akhir'];
            $insert_pertandingan_detail->tamu_skor_akhir            = $dataDetail['tamu_skor_akhir'];
            if($dataDetail['rumah_skor_akhir'] > $dataDetail['tamu_skor_akhir']){
                $text = 'Tim Home Menang';
            }
            elseif ($dataDetail['rumah_skor_akhir'] < $dataDetail['tamu_skor_akhir']) {
                $text = 'Tim Away Menang';
            }
            else{
                $text = 'Draw';
            }
            $insert_pertandingan_detail->status_akhir_pertandingan = $text;
            $count = PertandinganDetailModel::groupBy('pemain_pencentak_gol')->selectRaw('count(*) as total, pemain_pencentak_gol')->first();
            $insert_pertandingan_detail->pemain_pencentak_gol_terbanyak = $count['pemain_pencentak_gol'];
            $akumulasi_kemenangan_home = round($dataDetail['rumah_skor_akhir']/($dataDetail['rumah_skor_akhir']+$dataDetail['tamu_skor_akhir'])*100);
            $akumulasi_kemenangan_away = round($dataDetail['tamu_skor_akhir']/($dataDetail['rumah_skor_akhir']+$dataDetail['tamu_skor_akhir'])*100);
            $insert_pertandingan_detail->akumulasi_kemenangan_home = $akumulasi_kemenangan_home;
            $insert_pertandingan_detail->akumulasi_kemenangan_away = $akumulasi_kemenangan_away;
            $insert_pertandingan_detail->save();
            return response([
                'Test' => $dataDetail,
                'status' => 'Ok',
                'message' => 'Pertandingan Detail Disimpan',
                'data' => $insert_pertandingan_detail
            ], 200);
        }
        elseif($dataDetail){
            $status = 'Eror';
            $message = 'Hasil Pertandingan Sudah Ada';
        }
        else{
            $status = 'Pending';
            $message = 'Pertandingan Belom Selesai';
        }
        return response([
            'status' => $status,
            'message' => $message,
            'tanggal_pertandingan' => $check_data['tanggal_pertandingan'],
            'tanggal_pertandingan_1' => date('Y-m-d'),
            'waktu_pertandingan' => $check_data['selesai_waktu_pertandingan'],
            'waktu_pertandingan_1' => date("H:i:s"),
        ], 404); 

    }
}
