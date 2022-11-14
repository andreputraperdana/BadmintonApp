<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahMuridController extends Controller
{

    public function getindex()
    {
        return view('tambahmurid');
    }

    public function insert(Request $request)
    {
        $input = $request->input();
        $nama = $input['namaLengkap'];
        $uangDaftar = $input['uangDaftar'];
        $date = Carbon::today();
        // $date = '2022-12-02 00:00:00';
        DB::insert('INSERT INTO murid (nama_murid, nominal_daftar, created_at) values (?, ?, ?)', [$nama, $uangDaftar, $date]);
        DB::insert('INSERT INTO iuran_murid (nama_murid, jenis_iuran, nominal_iuran, created_at) values (?, ?, ?, ?)', [$nama, 'Iuran Murid Baru', $uangDaftar, $date]);
        DB::insert('INSERT INTO transaksi (uang_masuk, uang_keluar, created_at) values (?, ?, ?)', [$uangDaftar, 0, $date]);
        return view('successtambahmurid');
    }
}
