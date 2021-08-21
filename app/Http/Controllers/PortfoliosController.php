<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolios;

class PortfoliosController extends Controller
{
    public function PortfolioView(){
        return view('backend.pages.Portfolio.index',[
            'portfolios'=>Portfolios::latest()->paginate(10),
        ]);
    }
    public function PortfolioAdd(){
        return view('backend.pages.Portfolio.create');
    }
}
