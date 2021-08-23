<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Portfolios;
use App\Models\SiteSettings;
use App\Models\Testimonial;
use App\Models\Skill;
use App\Models\Social;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function  frontend(){
        return view('frontend.main',[
            'about' =>About::first(),
            'testimonial'=>Testimonial::latest()->get(),
            'skills' =>Skill::orderBy('id','desc')->get(),
            'socials' =>Social::orderBy('priority','asc')->get(),
            'portfolios'=>Portfolios::latest()->limit(5)->get(),
        ]);
    }
    public function frontendPort($slug){
        return view('frontend.portfolio_details',[
            'socials' =>Social::all(),
            'portfolio' => Portfolios::where('slug',$slug)->first(),

        ]);
    }
}
