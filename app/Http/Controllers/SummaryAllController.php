<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SummaryAllController extends Controller
{
    public function getindex()
    {
        $periode = request('periode');
        $periodeYear = substr($periode, 0, 4);
        $periodeMonth = substr($periode, 5, 8);
        if ($periode == null) {
            $all = DB::select('SELECT MONTHNAME(created_at) as bulan, coalesce(SUM(uang_masuk), 0) as totalUangMasuk, coalesce(SUM(uang_keluar), 0) as totalUangKeluar, created_at from transaksi GROUP BY bulan ORDER BY created_at');
            // $allTotal = DB::select('SELECT SUM(coalesce(SUM(uang_masuk), 0) as totalUangMasuk) as subTotalUangMasuk, SUM(coalesce(SUM(uang_keluar), 0) as totalUangKeluar) as subTotalUangKeluar from transaksi');
        } else {
            $all = DB::select('SELECT MONTHNAME(created_at) as bulan, coalesce(SUM(uang_masuk), 0) as totalUangMasuk, coalesce(SUM(uang_keluar), 0) as totalUangKeluar, created_at from transaksi WHERE MONTH(created_at) = ? AND YEAR(created_at) = ? GROUP BY bulan ORDER BY created_at', [$periodeMonth, $periodeYear]);
            // $listAll = DB::select('select * from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
            // $sumTotal = DB::select('select coalesce(SUM(nominal_pengeluaran), 0) as subTotal from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
            // $monthDb = DB::select('select MONTH(created_at) as bulan from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
        }
        return view('summaryall', ['all' => $all]);
    }

    public function getDataSummaryAll(Request $request)
    {
        $input = $request->input();
        $periode = $input['periode'];
        $periodeYear = substr($periode, 0, 4);
        $periodeMonth = substr($periode, 5, 8);
        if ($periode == null) {
            $all = DB::select('SELECT MONTHNAME(created_at) as bulan, coalesce(SUM(uang_masuk), 0) as totalUangMasuk, coalesce(SUM(uang_keluar), 0) as totalUangKeluar, created_at from transaksi GROUP BY bulan ORDER BY created_at');
            // $listAll = DB::select('select * from pengeluaran');
            // $semua = DB::select('SELECT MONTH(created_at) as bulan, coalesce(SUM(nominal_pengeluaran), 0) as subTotal, jenis_pengeluaran, created_at, nominal_pengeluaran from pengeluaran');
            // $sumTotal = DB::select('SELECT coalesce(SUM(nominal_pengeluaran), 0) as subTotal from pengeluaran');
            // $monthDb = DB::select('select MONTH(created_at) as bulan from pengeluaran');
        } else {
            $all = DB::select('SELECT MONTHNAME(created_at) as bulan, coalesce(SUM(uang_masuk), 0) as totalUangMasuk, coalesce(SUM(uang_keluar), 0) as totalUangKeluar, created_at from transaksi WHERE MONTH(created_at) = ? AND YEAR(created_at) = ? GROUP BY bulan ORDER BY created_at', [$periodeMonth, $periodeYear]);
            // $listAll = DB::select('select * from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
            // $sumTotal = DB::select('select coalesce(SUM(nominal_pengeluaran), 0) as subTotal from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
            // $monthDb = DB::select('select MONTH(created_at) as bulan from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
        }
        return view('summaryall', ['all' => $all]);
    }
}
