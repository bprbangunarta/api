<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index($id)
    {
        $transaksi = Transaksi::where(function ($query) use ($id) {
            $query->where('cracc', $id)
                ->orWhere('dracc', $id);
        })
            ->whereNotIn('ststrn', ['9'])
            ->orderBy('inptgljam', 'DESC')
            ->get();

        if ($transaksi->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $transaksi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'data'    => ''
            ], 401);
        }
    }

    public function last_month($id)
    {
        $timezone = 'Asia/Jakarta';
        $now = Carbon::now()->setTimezone($timezone);
        $tahun = $now->format('Y');
        $bulan = $now->format('m');
        $param = $tahun . $bulan;

        $transaksi = Transaksi::where(function ($query) use ($id) {
            $query->where('cracc', $id)
                ->orWhere('dracc', $id);
        })
            ->where('thnbln', $param)
            ->whereNotIn('ststrn', ['9'])
            ->orderBy('inptgljam', 'DESC')
            ->get();

        if ($transaksi->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $transaksi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'data'    => ''
            ], 401);
        }
    }

    public function by_date($id, $startDate, $endDate)
    {
        $transaksi = Transaksi::where(function ($query) use ($id) {
            $query->where('cracc', $id)
                ->orWhere('dracc', $id);
        })
            ->whereBetween('tgltrn', [$startDate, $endDate])
            ->orderBy('inptgljam', 'ASC')
            ->get();

        if ($transaksi->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $transaksi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'data'    => ''
            ], 401);
        }
    }

    public function show($id, $param)
    {
        $transaksi = Transaksi::where(function ($query) use ($id) {
            $query->where('cracc', $id)
                ->orWhere('dracc', $id);
        })
            ->where('inptgljam', $param)
            ->first();

        if (!is_null($transaksi)) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $transaksi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'data'    => ''
            ], 401);
        }
    }
}
