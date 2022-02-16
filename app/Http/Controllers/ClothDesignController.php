<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClothDesignController extends Controller
{
    public function clothDesign()
    {
        return view('cloth.design.index',[
        'designs'=>DB::table('cloth_designs')->latest(),    
        ]);
    }
}
