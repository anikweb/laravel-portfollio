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
            'testimonial' => Testimonial::latest()->paginate(10),
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
    function testimonialDelete($id){
        $softDelete = Testimonial::findOrFail($id)->delete();
        if($softDelete){
            return back()->with('success','Testimonial Deleted.');
        }else{
            return back()->with('fail','Testimonial Deleted failed.');
        }
    }
    function testimonialEdit($id){
        return view('backend.pages.testimonial.edit-testimonial',[
            'siteItem' => SiteSettings::first(),
            'testimonial'=>Testimonial::findOrFail($id),
        ]);
    }
    function testimonialEditUpdate(Request $request){
        // return 'ok';
        $update = Testimonial::findOrFail($request->id);
        if($update->name == $request->name && $update->designation == $request->designation && $update->praise == $request->summary && $request->file('image')==''){
            return back()->with('fail','can\'t update. Because you did not change any field.');
        }else{
            $update->name = $request->name;
            $update->designation = $request->designation;
            $update->praise = $request->summary;

            if($request->hasFile('image')){
                $oldImage = public_path('front/images/testimonial/'.$update->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('image');
                $newName = Str::slug($request->name).'-'.Str::random(10).'.'.$image->getClientOriginalExtension();
                $destination = public_path('front/images/testimonial/'.$newName);
                Image::make($image)->save($destination);
                $update->image = $newName;
            }
            $update->save();
            return redirect()->route('testimonialView')->with('success','Testimonial Updated.');
        }

    }
}
