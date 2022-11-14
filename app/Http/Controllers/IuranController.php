<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IuranController extends Controller
{
    public function getindex()
    {
        $listsNama = DB::select('select * from murid order by nama_murid');
        return view('iuran', ['listsNama' => $listsNama]);
    }

    public function insertiuran(Request $request)
    {
        // $listsNama = DB::select('select * from murid order by nama_murid');
        $input = $request->input();
        $listNama = $input['listNama'];
        $nominalIuran = $input['nominalIuran'];
        // dd($nominalIuran);
        $date = Carbon::today();
        DB::insert('INSERT INTO iuran_murid (nama_murid, jenis_iuran, nominal_iuran, created_at) values (?, ?, ?, ?)', [$listNama, 'Iuran Bulanan', $nominalIuran, $date]);
        DB::insert('INSERT INTO transaksi (uang_masuk, uang_keluar, created_at) values (?, ?, ?)', [$nominalIuran, 0, $date]);

        return view('successtambahiuranmurid');
    }
}
