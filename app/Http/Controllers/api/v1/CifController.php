<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cif;
use Illuminate\Http\Request;

class CifController extends Controller
{
    public function index()
    {
        $posts = Cif::latest()->get();
        return response([
            'success' => true,
            'message' => 'Success',
            'data' => $posts
        ], 200);
    }

    public function show($id)
    {
        $post = Cif::where('nocif', $id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data'    => $post
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
