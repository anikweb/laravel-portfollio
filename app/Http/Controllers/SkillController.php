<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use App\Models\Skill;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class SkillController extends Controller
{
    function skillView(){
        return view('backend.pages.skills.view-skills',[
            'siteItem'=> SiteSettings::first(),
            'skills' => Skill::paginate(10),
        ]);
    }
    function skillAdd(){
        return view('backend.pages.skills.add-skill',[
            'siteItem'=>SiteSettings::first(),
        ]);
    }
    function skillUpdate(Request $request){
        $request->validate([
            'name'=>'required|unique:skills,name',
        ],[
           'name.unique'=> $request->name.' Already Taken or store in trash.',
        ]);
        $skill = new Skill;
        $skill->name = Str::upper($request->name);
        $skill->percentage = $request->percentage;
        $skill->save();
        return redirect()->route('skillView')->with('success','Skill added.');
    }
    function skillDelete($id){
        $skill = Skill::find($id);

        if($skill){
            $skill->delete();
            return back()->with('success',' Skill deleted.');
        }else{
            return back()->with('fail',' Skill delete failed.');

        }
    }
}
