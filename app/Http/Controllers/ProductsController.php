<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id'   =>  1, 'name'   =>  'Product 1'],
            ['id'   =>  2, 'name'   =>  'Product 2'],
            ['id'   =>  3, 'name'   =>  'Product 3'],
            ['id'   =>  4, 'name'   =>  'Product 4'],
        ], 200);
    }
}
