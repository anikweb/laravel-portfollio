<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutControllers extends Controller
{
    function aboutSettings(){
        return view('backend.pages.about-settings',[
            'about' => About::first(),
        ]);
    }
    function aboutSettingsEdit($slug){
        return view('backend.pages.about-settings-edit',[
            'about' =>About::first(),
            'slug' =>$slug,
        ]);
    }
    function aboutSettingsUpdate(Request $request){
        // return $request;
        if($request->settingItem == 'about'){
            $about = About::findOrFail($request->settingId);
            $about->about = $request->EditableValue;
            $about->save();
            return redirect()->route('aboutSettings')->with('success','About Update Success.');
        }elseif($request->settingItem == 'image'){
            $about = About::findOrFail($request->settingId);
            if($request->hasFile('EditableValue')){
                $oldImage = public_path('front/images/about/'.$about->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('EditableValue');
                $newName = 'about'.Str::random(10).'.'.$image->getClientOriginalExtension();
                $destination = public_path('front/images/about/'.$newName);
                Image::make($image)->save($destination);
                $about->image = $newName;
                $about->save();
                return redirect()->route('aboutSettings')->with('success','Image Change Success.');

            }else{
                return back()->with('fail','You did not select any image! please choose image before update.');

            }
        }elseif($request->settingItem == 'certificates'){
            $about = About::findOrFail($request->settingId);
            $about->certificates = $request->EditableValue;
            $about->save();
            return redirect()->route('aboutSettings')->with('success','Certificates Update Success.');
        }elseif($request->settingItem == 'awards'){
            $about = About::findOrFail($request->settingId);
            $about->awards = $request->EditableValue;
            $about->save();
            return redirect()->route('aboutSettings')->with('success','Awards Update Success.');
        }elseif($request->settingItem == 'degrees'){
            $about = About::findOrFail($request->settingId);
            $about->degrees = $request->EditableValue;
            $about->save();
            return redirect()->route('aboutSettings')->with('success','Degrees Update Success.');
        }elseif($request->settingItem == 'experience-year'){
            $about = About::findOrFail($request->settingId);
            $about->experience_year = $request->EditableValue;
            $about->save();
            return redirect()->route('aboutSettings')->with('success','Experience Year Update Success.');
        }
    }
}
