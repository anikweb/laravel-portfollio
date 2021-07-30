<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TestimonialControllers extends Controller
{
    function testimonialView(){


        return view('backend.pages.testimonial.view-testimonial',[
            'siteItem' => SiteSettings::first(),
            'testimonial' => Testimonial::orderBy('id','desc')->paginate(10),
        ]);
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
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newName = Str::slug($request->name).'-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('front/images/testimonial/'.$newName);
            Image::make($image)->save($destination);
            $testimonial->image =$newName;
        }
        $testimonial->save();
        return redirect()->route('testimonialView')->with('success','Testimonial add success');
    }
}
