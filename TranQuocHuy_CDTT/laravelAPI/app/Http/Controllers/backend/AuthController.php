<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AuthController extends Controller
{
    //
    public function login()
    {
        $categorys = Category::all();
        return response()->json(
        [
            'success' => true,
            'message' => 'Tải dữ liệu thành công',
            'categorys' => $categorys
        ],
            200
        );
    }

}
