<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialControllers extends Controller
{
    function testimonialView(){
        return 'ok';
    }
    function testimonialAdd(){
        return view('backend.pages.testimonial.add-testimonial',[
            'siteItem' => SiteSettings::first(),
        ]);
    }
    function testimonialUpdate(Request $request){
        // return $request;
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->praise = $request->summary;
        $testimonial->save();
        return redirect()->route('testimonialView')->with('success','Testimonial add success');
    }
}
