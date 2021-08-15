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
        $socialSite = SocialSites::findOrFail($request->social_id);
        $social->url_name = $socialSite->master_url.'/'.$request->social_username;
        $social->save();
        return redirect()->route('SocialView')->with('success',$social->socialSite->site_name.' Added.');
    }
    public function SocialView(){
        return view('backend.pages.social.index',[
            'social' =>Social::latest()->paginate(10),
        ]);
    }
}
