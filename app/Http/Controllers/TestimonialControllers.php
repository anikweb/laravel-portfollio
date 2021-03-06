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
        if(auth()->user()->can('view testimonial')){
            return view('backend.pages.testimonial.view-testimonial',[
                'testimonial' => Testimonial::latest()->paginate(10),
            ]);
        }else{
            return abort('404');
        }
    }
    function testimonialAdd(){
        if(auth()->user()->can('add testimonial')){
            return view('backend.pages.testimonial.add-testimonial');
        }else{
            return abort('404');
        }
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
        if(auth()->user()->can('delete testimonial')){
            $softDelete = Testimonial::findOrFail($id)->delete();
            if($softDelete){
                return back()->with('success','Testimonial Deleted.');
            }else{
                return back()->with('fail','Testimonial Deleted failed.');
            }
        }else{
            return abort('404');
        }
    }
    function testimonialEdit($id){
        if(auth()->user()->can('edit testimonial')){
            return view('backend.pages.testimonial.edit-testimonial',[
                'testimonial'=>Testimonial::findOrFail($id),
            ]);
        }else{
            return abort('404');
        }
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
