<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\SocialSites;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function SocialAdd(){
        return view('backend.pages.social.create',[
            'socialName'=>SocialSites::orderBy('site_name','asc')->get(),
        ]);
    }
    public function SocialPost(Request $request){
        $social = new Social;
        $social->social_id = $request->social_id;
        $social->url_name = $request->social_username;
        $social->save();
        return redirect()->route('SocialView')->with('success',$social->socialSite->site_name.' Added.');
    }
    public function SocialView(){
        return view('backend.pages.social.index',[
            'social' =>Social::latest()->paginate(10),
        ]);
    }
    public function SocialEdit($id){
        return view('backend.pages.social.edit',[
            'socialName'=> SocialSites::orderBy('site_name','asc')->get(),
            'socialLink'=>Social::findOrFail($id),
        ]);
    }
    public function SocialUpdate(Request $request){
        // return $request;
        $social = Social::findorFail($request->social_pre_id);
        $social->social_id = $request->social_id;
        $social->url_name = $request->social_username;
        $social->save();
        return redirect()->route('SocialView')->with('success',$social->socialSite->site_name.' Updated.');
    }
    public function SocialDelete($id){
        // return $id;
        $social = Social::findOrFail($id);
        $social->delete();
        return redirect()->route('SocialView')->with('success','Social has been moved to trash');
    }
    public function SocialSiteAdd(){
        return view('backend.pages.social_site.create');
    }
    public function SocialSitePost(Request $request){
        // return $request;
        $social_site = new SocialSites;
        $social_site->site_name =$request->social_site_title;
        $social_site->site_icon =$request->social_icon;
        $social_site->master_url =$request->master_url;
        $social_site->save();
        return redirect()->route('SocialSiteView')->with('success',$social_site->site_name.' Added.');
    }
    public function SocialSiteView(){
        return view('backend.pages.social_site.index',[
            'social_sites'=>SocialSites::latest()->paginate(10),
        ]);
    }
    public function SocialSiteDelete($id){
        $socialSite = SocialSites::findOrFail($id);
        if($socialSite->social->count() < 1){
            $socialSite->delete();
            return redirect()->route('SocialSiteView')->with('success','Social Sites has been moved to trash!');
        }
        else{
            return redirect()->route('SocialSiteView')->with('fail','failed, this social site has been used to your socials.');
        }
    }
    public function SocialSiteEdit($id){
        // return $id;
        return view('backend.pages.social_site.edit',[
            'socialSite'=>SocialSites::findOrFail($id),
        ]);
    }
    public function SocialSiteUpdate(Request $request){
        // return $request;
        $socialSite = SocialSites::findOrFail($request->social_site_id);
        $socialSite->site_name = $request->social_site_title;
        $socialSite->site_icon = $request->social_icon;
        $socialSite->master_url = $request->master_url;
        $socialSite->save();
        return redirect()->route('SocialSiteView')->with('success',$socialSite->site_name.' Updated!');
    }
    public function SocialId($socialId){
        $getSocialUrl = SocialSites::findOrFail($socialId);
        return response()->json('https://'.$getSocialUrl->master_url.'/');
    }
}
