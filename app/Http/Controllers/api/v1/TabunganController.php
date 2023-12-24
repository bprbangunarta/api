<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function index($id)
    {
        $cif = Tabungan::where('nocif', $id)->get();

        if ($cif) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $cif
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'data'    => ''
            ], 401);
        }
    }

    public function show($id)
    {
        $noacc = Tabungan::where('noacc', $id)->first();

        if ($noacc) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $noacc
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
