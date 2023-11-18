<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getLaptop()
    {
        $laptop = Laptop::all();
        $response = [
            'status' => 'success',
            'message' => 'Data Berhasil Diambil',
            'data' => $laptop
        ];
        return response()->json($response);
    }
}
