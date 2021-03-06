<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\SocialSites;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    public function SocialAdd(){
        if(auth()->user()->can('add social')){
            return view('backend.pages.social.create',[
                'socialName'=>SocialSites::orderBy('site_name','asc')->get(),
            ]);
        }else{
            return abort('404');
        }
    }
    public function SocialPost(Request $request){
        if(Str::is('www.*',$request->social_username)){
            return back()->with('userNameEror','Only enter username except \'www.\'');
        }elseif(Str::is('https://*',$request->social_username)){
            return back()->with('userNameEror','Only enter username except \'https://\'');
        }
        $request->validate([
            'social_id' => 'required',
            'social_username' =>'required',
        ],[
            'social_id.required'=> 'Please select social link before add',
        ]);
        $social = new Social;
        $social->social_id = $request->social_id;
        $social->url_name = $request->social_username;
        $social->priority = $social->max('priority') + 1;
        $social->save();
        return redirect()->route('SocialView')->with('success',$social->socialSite->site_name.' Added.');
    }
    public function SocialView(){
        if(auth()->user()->can('view social')){
            return view('backend.pages.social.index',[
                'social' =>Social::orderBy('priority','asc')->paginate(10),
            ]);
        }else{
            return abort('404');
        }
    }
    public function SocialEdit($id){
        if(auth()->user()->can('edit social')){
            return view('backend.pages.social.edit',[
                'socialName'=> SocialSites::orderBy('site_name','asc')->get(),
                'socialLink'=>Social::findOrFail($id),
            ]);
        }else{
            return abort('404');
        }
    }
    public function SocialUpdate(Request $request){
        $social = Social::findorFail($request->social_pre_id);
        if(Str::is('www.*',$request->social_username)){
            return back()->with('userNameEror','Please Remove \'www.\', only enter username');
        }elseif(Str::is('https://*',$request->social_username)){
            return back()->with('userNameEror','Please Remove \'https://.\', only enter username');
        }elseif($social->social_id = $request->social_id && $social->url_name == $request->social_username){
            return back()->with('notChange','You did not change!');
        }
        $request->validate([
            'social_id' => 'required',
            'social_username' =>'required',
        ],[
            'social_id.required'=> 'Please select social link before add',
        ]);

        $social->social_id = $request->social_id;
        $social->url_name = $request->social_username;
        $social->save();
        return redirect()->route('SocialView')->with('success',$social->socialSite->site_name.' Updated.');
    }
    public function SocialDelete($id){

        if(auth()->user()->can('delete social')){
            // return $id;
            $social = Social::findOrFail($id);
            $social->delete();
            return redirect()->route('SocialView')->with('success','Social has been moved to trash');
        }else{
            return abort('404');
        }
    }
    public function SocialSiteAdd(){
        if(auth()->user()->can('add social site')){
            return view('backend.pages.social_site.create');
        }else{
            return abort('404');
        }
    }
    public function SocialSitePost(Request $request){
        if(Str::is('www.*',$request->master_url)){
            return back()->with('userNameEror','Only enter url except \'www.\'');
        }elseif(Str::is('https://*',$request->master_url)){
            return back()->with('userNameEror','Only enter url except \'https://.\'');
        }
        $request->validate([
            'social_site_title' => 'required|unique:social_sites,site_name',
            'social_icon' => 'required',
            'master_url' =>'required|unique:social_sites,master_url',
        ]);
        $social_site = new SocialSites;
        $social_site->site_name =$request->social_site_title;
        $social_site->site_icon =$request->social_icon;
        $social_site->master_url =$request->master_url;
        $social_site->save();
        return redirect()->route('SocialSiteView')->with('success',$social_site->site_name.' Added.');
    }
    public function SocialSiteView()
    {
        if(auth()->user()->can('view social site')){
            return view('backend.pages.social_site.index',[
                'social_sites'=>SocialSites::latest()->paginate(10),
            ]);
        }else{
            return abort('404');
        }

    }
    public function SocialSiteDelete($id){
        if(auth()->user()->can('delete social site')){
            $socialSite = SocialSites::findOrFail($id);
            if($socialSite->social->count() < 1){
                $socialSite->delete();
                return redirect()->route('SocialSiteView')->with('success','Social Sites has been moved to trash!');
            }
            else{
                return redirect()->route('SocialSiteView')->with('fail','failed, this social site has been used to your socials.');
            }
        }else{
            return abort('404');
        }
    }
    public function SocialSiteEdit($id){
        if(auth()->user()->can('edit social site')){
            // return $id;
            return view('backend.pages.social_site.edit',[
                'socialSite'=>SocialSites::findOrFail($id),
            ]);
        }else{
            return abort('404');
        }
    }
    public function SocialSiteUpdate(Request $request){
        $socialSite = SocialSites::findOrFail($request->social_site_id);
        if(Str::is('www.*',$request->master_url)){
            return back()->with('userNameEror','Only enter url except \'www.\'');
        }elseif(Str::is('https://*',$request->master_url)){
            return back()->with('userNameEror','Only enter url except \'https://.\'');
        }elseif($socialSite->site_name == $request->social_site_title && $socialSite->site_icon = $request->social_icon &&  $socialSite->master_url = $request->master_url){
            return back()->with('notChange','You did not change!');
        }
        $request->validate([
            'social_site_title' => 'required|unique:social_sites,site_name,'.$request->social_site_id,
            'master_url' =>'required|unique:social_sites,master_url,'.$request->social_site_id,
            'social_icon' => 'required',
        ]);
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
    public function socialPriorityUpdate(Request $request){
        if(auth()->user()->can('edit social')){
            $social = Social::findOrFail($request->social_id);
            $social->priority = $request->social_priority;
            $social->save();
            return back()->with('success','Priority Changed');
        }else{
            return abort('404');
        }
    }

}
