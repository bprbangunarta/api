<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Deposito;
use Illuminate\Http\Request;

class DepositoController extends Controller
{
    public function index($id)
    {
        $cif = Deposito::where('nocif', $id)->get();

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
        $noacc = Deposito::where('noacc', $id)->first();

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
