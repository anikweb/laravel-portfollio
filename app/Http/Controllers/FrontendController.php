<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\SiteSettings;
use App\Models\Testimonial;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function  frontend(){
        return view('frontend.master',[
            'about' =>About::first(),
            'testimonial'=>Testimonial::latest()->get(),
            'skills' =>Skill::orderBy('id','desc')->get(),
        ]);
    }
}
