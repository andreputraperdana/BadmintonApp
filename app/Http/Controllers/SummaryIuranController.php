<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryIuranController extends Controller
{
    public function getindex()
    {
        $periode = request('periode');
        $periodeYear = substr($periode, 0, 4);
        $periodeMonth = substr($periode, 5, 8);
        if ($periode == null) {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, nama_murid, jenis_iuran, created_at, nominal_iuran from iuran_murid order by created_at');
            $sumTotal = DB::select('SELECT coalesce(SUM(nominal_iuran), 0) as subTotal from iuran_murid');
        } else {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, nama_murid, jenis_iuran, created_at, nominal_iuran from iuran_murid WHERE MONTH(created_at) = ? AND YEAR(created_at) = ? order by created_at', [$periodeMonth, $periodeYear]);
            $sumTotal = DB::select('select coalesce(SUM(nominal_iuran), 0) as subTotal from iuran_murid WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
        }
        return view('summaryiuran', ['semua' => $semua, 'sumTotal' => $sumTotal]);
    }

    public function getData(Request $request)
    {
        $input = $request->input();
        $periode = $input['periode'];
        $periodeYear = substr($periode, 0, 4);
        $periodeMonth = substr($periode, 5, 8);
        if ($periode == null) {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, nama_murid, jenis_iuran, created_at, nominal_iuran from iuran_murid order by created_at');
            $sumTotal = DB::select('SELECT coalesce(SUM(nominal_iuran), 0) as subTotal from iuran_murid');
        } else {
            $semua = DB::select('SELECT MONTHNAME(created_at) as bulan, nama_murid, jenis_iuran, created_at, nominal_iuran from iuran_murid WHERE MONTH(created_at) = ? AND YEAR(created_at) = ? ORDER BY created_at', [$periodeMonth, $periodeYear]);
            $sumTotal = DB::select('select coalesce(SUM(nominal_iuran), 0) as subTotal from iuran_murid WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?', [$periodeMonth, $periodeYear]);
        }
        return view('summaryiuran', ['semua' => $semua, 'sumTotal' => $sumTotal]);
    }
}
