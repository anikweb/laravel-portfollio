<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSettings;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SiteSettingsControllers extends Controller
{
    function siteSettings(){
        return view('backend.pages.site-settings');
    }

    function siteSettingsEdit($slug){
        return view('backend.pages.site-settings-edit',[
            'slug' =>$slug,
        ]);
    }

    function siteSettingsUpdate(Request $request){
        $siteSettings = SiteSettings::findOrFail($request->settingId);
        if($request->settingItem == 'logo'){
            if($request->hasFile('EditableValue')){
                $oldImage = public_path('front/images/site-logo/'.$siteSettings->logo);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('EditableValue');
                $ext = 'site-logo-'.Str::random(10).'.'.$image->getClientOriginalExtension();
                image::make($image)->save(public_path('front/images/site-logo/'.$ext));
                $siteSettings->logo = $ext;
                $siteSettings->save();
                return redirect('site-settings')->with('success','Logo Changed.');
            }else{
                return back()->with('fail','You did not choose any logo. please choose any logo before update.');
            }
        }elseif($request->settingItem == 'icon'){
            if($request->hasFile('EditableValue')){
                $oldImage = public_path('front/images/site-icon/'.$siteSettings->icon);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('EditableValue');
                $ext = 'site-icon-'.Str::random(10).'.'.$image->getClientOriginalExtension();
                image::make($image)->save(public_path('front/images/site-icon/'.$ext));
                $siteSettings->icon = $ext;
                $siteSettings->save();
                return redirect('site-settings')->with('success','Icon Changed.');
            }else{
                return back()->with('fail','You did not choose any icon. please choose any icon before update.');
            }
        }
        elseif($request->settingItem == 'title'){
            $siteSettings->title =$request->EditableValue;
        }elseif($request->settingItem == 'description'){
            $siteSettings->description =$request->EditableValue;
        }elseif($request->settingItem == 'background-video'){
            if($request->hasFile('EditableValue')){
                $video = $request->file('EditableValue');
                $oldVideo = public_path('front/video/background-video/'.$siteSettings->backgroundVideo);
                if(file_exists($oldVideo)){
                    unlink($oldVideo);
                }
                $ext = 'background-video-'.Str::random(5).'.'.$video->getClientOriginalExtension();
                $destinationPath = public_path('front/video/background-video/');
                $video->move($destinationPath,$ext);
                $siteSettings->backgroundVideo =$ext;
                $siteSettings->save();
                return redirect('site-settings')->with('success','Background Video Changed.');
            }else{
                return back()->with('fail','You did not choose any video. please choose any video before update.');
            }
        }else{
            return redirect('site-settings')->with('fail',' failed to update site settings');
        }
    }
}
