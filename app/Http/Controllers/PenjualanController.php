<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use Carbon\Carbon;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stock = Stock::all();

        // GET total data hari ini
        $today = today();
        $hari_ini = DB::table('buyers')
                ->whereDate('created_at', $today)
                ->sum('jumlah_mobil');

        // $most_today = DB::table('buyers')
        //         ->whereRaw('DATE(created_at) >= ?',[date($today)])
        //         ->max('jumlah_mobil');

        // GET data kemarin
        $kemarin = DB::table('buyers')
                ->whereDate('created_at', [date('Y-m-d', strtotime('-1 days'))])
                ->sum('jumlah_mobil');

        $tujuh_hari = DB::table('buyers')
        ->whereBetween('buyers.created_at', [ Carbon::now()->subDays(7),Carbon::now()])
        ->sum('jumlah_mobil');

        if ($kemarin && $hari_ini) {
            $percent = (($hari_ini - $kemarin) / $kemarin)*100;
        } elseif ($kemarin){
            $percent= ($hari_ini - $kemarin) *100;
        } else {
            $percent = $hari_ini*100;
        }

        // total penjualan hr ini
        $today = today();
        $harga = DB::table('buyers')
                ->leftJoin('stocks', 'stocks.id', '=', 'buyers.stocks_id')
                ->select(
                    'buyers.id',
                    'stocks_id',
                    'stocks.harga_mobil',
                     DB::raw('(stocks.harga_mobil * buyers.jumlah_mobil) as total_penjualan')
                )
                ->whereDate('buyers.created_at', $today)
                ->get()
                ->sum('total_penjualan');

        $harga_kemarin = DB::table('buyers')
                ->leftJoin('stocks', 'stocks.id', '=', 'buyers.stocks_id')
                ->select(
                    'buyers.id',
                    'stocks_id',
                    'stocks.harga_mobil',
                    DB::raw('(stocks.harga_mobil * buyers.jumlah_mobil) as total_penjualan')
                )
                ->whereDate('buyers.created_at', Carbon::yesterday())
                ->get()
                ->sum('total_penjualan');

        if ($harga_kemarin) {
            $percent_harga = (($harga - $harga_kemarin) / $harga_kemarin)*100;
        } else {
            $percent_harga = $harga*100;
        }


        $harga_7hari = DB::table('buyers')
        ->leftJoin('stocks', 'stocks.id', '=', 'buyers.stocks_id')
        ->select(
            'buyers.id',
            'stocks_id',
            'stocks.harga_mobil',
            DB::raw('(stocks.harga_mobil * buyers.jumlah_mobil) as total_penjualan')
        )
        ->whereBetween('buyers.created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->get()
        ->sum('total_penjualan');


        $mobil = DB::table('buyers')
                ->leftJoin('stocks', 'stocks.id', '=', 'buyers.stocks_id')
                ->select(
                    'buyers.id',
                    'stocks_id',
                    'stocks.nama_mobil',
                    'buyers.jumlah_mobil',
                )
                ->whereDate('buyers.created_at', $today)
                ->orderBy('buyers.jumlah_mobil', 'desc')
                ->first();

        $mobil_7hari = DB::table('buyers')
                ->leftJoin('stocks', 'stocks.id', '=', 'buyers.stocks_id')
                ->select(
                    'buyers.id',
                    'stocks_id',
                    'stocks.nama_mobil',
                    'buyers.jumlah_mobil',
                )
                ->whereBetween('buyers.created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->orderBy('buyers.jumlah_mobil', 'desc')
                ->first();


    return view ('penjualan.index', [
        // 'max_penjualan' => $max_penjualan,
        'percent' => $percent,
        'kemarin' => $kemarin,
        'hari_ini' => $hari_ini,
        // 'total_today' => $total_today,
        // 'data' => $data,
        'stock' => $stock,
        // 'total_penjualan' => $total_penjualan,
        // 'most_today' => $most_today,
        'harga' => $harga,
        'mobil' => $mobil,
        'mobil_7hari' => $mobil_7hari,
        'harga_7hari' => $harga_7hari,
        'tujuh_hari' => $tujuh_hari,
        'percent_harga' => $percent_harga

    ]);
  }

}
