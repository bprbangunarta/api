<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

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
}
