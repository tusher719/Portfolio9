<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('Portfolio9.index',[
            'about' => About::where('status',1)->first()
        ]);
    }
}
