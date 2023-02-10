<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showData()
    {
        $products = DB::table('products')->get();
        return view('welcome', compact('products'));
    }
}
