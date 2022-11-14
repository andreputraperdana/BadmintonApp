<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PengeluaranController extends Controller
{
    public function getindex()
    {
        return view('pengeluaran');
    }

    public function insertpengeluaran(Request $request)
    {
        $input = $request->input();
        $jenisPengeluaran = $input['jenisPengeluaran'];
        $nominalPengeluaran = $input['nominalPengeluaran'];
        // dd($nominalIuran);
        $date = Carbon::today();

        DB::insert('INSERT INTO pengeluaran (jenis_pengeluaran, nominal_pengeluaran, created_at) values (?, ?, ?)', [$jenisPengeluaran, $nominalPengeluaran, $date]);
        DB::insert('INSERT INTO transaksi (uang_masuk, uang_keluar, created_at) values (?, ?, ?)', [0, $nominalPengeluaran, $date]);

        return view('successtambahpengeluaran');
    }
}
