<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    // public function index($id)
    // {
    //     $cif = Tabungan::where('nocif', $id)->get();

    //     if ($cif) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Success',
    //             'data'    => $cif
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Failed',
    //             'data'    => ''
    //         ], 401);
    //     }
    // }

    public function simapan($id)
    {
        $cif = Tabungan::where('nocif', $id)->where('kodeprd', '01')->get();

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

    public function siloka($id)
    {
        $cif = Tabungan::where('nocif', $id)->where('kodeprd', '02')->get();

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

    public function simantap($id)
    {
        $cif = Tabungan::where('nocif', $id)->where('kodeprd', '03')->get();

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

    public function simabrur($id)
    {
        $cif = Tabungan::where('nocif', $id)->whereIn('kodeprd', ['04', '05'])->get();

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
