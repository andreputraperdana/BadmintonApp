<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryPengeluaranController extends Controller
{
    public function getindex()
    {
        $periode = request('periode');
        $periodeYear = substr($periode, 0, 4);
        $periodeMonth = substr($periode, 5, 8);
        if ($periode == null) {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, jenis_pengeluaran, created_at, nominal_pengeluaran from pengeluaran order by created_at');
            $sumTotal = DB::select('SELECT coalesce(SUM(nominal_pengeluaran), 0) as subTotal from pengeluaran');
        } else {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, jenis_pengeluaran, created_at, nominal_pengeluaran from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ? order by created_at', [$periodeMonth, $periodeYear]);
            $sumTotal = DB::select('select coalesce(SUM(nominal_pengeluaran), 0) as subTotal from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
        }
        return view('summarypengeluaran', ['semua' => $semua, 'sumTotal' => $sumTotal]);
    }

    public function getDataPengeluaran(Request $request)
    {
        $input = $request->input();
        $periode = $input['periode'];
        $periodeYear = substr($periode, 0, 4);
        $periodeMonth = substr($periode, 5, 8);
        if ($periode == null) {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, jenis_pengeluaran, created_at, nominal_pengeluaran from pengeluaran order by created_at');
            $sumTotal = DB::select('SELECT coalesce(SUM(nominal_pengeluaran), 0) as subTotal from pengeluaran');
        } else {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, jenis_pengeluaran, created_at, nominal_pengeluaran from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ? order by created_at', [$periodeMonth, $periodeYear]);
            $sumTotal = DB::select('select coalesce(SUM(nominal_pengeluaran), 0) as subTotal from pengeluaran WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
        }
        return view('summarypengeluaran', ['semua' => $semua, 'sumTotal' => $sumTotal]);
    }
}
