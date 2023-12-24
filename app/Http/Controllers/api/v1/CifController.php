<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cif;
use Illuminate\Http\Request;

class CifController extends Controller
{
    public function index()
    {
        $cif = Cif::get();
        return response([
            'success' => true,
            'message' => 'Success',
            'data' => $cif
        ], 200);
    }

    public function show($id)
    {
        $cif = Cif::where('nocif', $id)->first();


        if ($cif) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $cif
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Filed',
                'data'    => ''
            ], 401);
        }
    }
}
