<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use App\Models\Skill;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class SkillController extends Controller
{
    function skillView(){

        if(auth()->user()->can('view skill')){
            return view('backend.pages.skills.view-skills',[
                'skills' => Skill::paginate(10),
            ]);
        }else{
            return abort('404');
        }
    }
    function skillAdd(){
        if(auth()->user()->can('add skill')){
            return view('backend.pages.skills.add-skill');
        }else{
            return abort('404');
        }
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
        if(auth()->user()->can('delete  management')){
            $skill = Skill::find($id);
            if($skill){
                $skill->delete();
                return back()->with('success',' Skill deleted.');
            }else{
                return back()->with('fail',' Skill delete failed.');
            }
        }else{
            return abort('404');
        }
    }
    function skillEdit($id){
        if(auth()->user()->can('edit skill')){
            return view('backend.pages.skills.edit-skill',[
                'skill' =>Skill::findOrFail($id),
            ]);
        }else{
            return abort('404');
        }
    }
    function skillEditUpdate(Request $request){
        $skillUpdate = Skill::findOrFail($request->id);

        if($skillUpdate->name != $request->name || $skillUpdate->percentage != $request->percentage){
            $skillUpdate->name = Str::upper($request->name);
            $skillUpdate->percentage = $request->percentage;
            $skillUpdate->save();
            return redirect()->route('skillView')->with('success','Skill updated');
        }else{
            return back()->with('fail','Skill updated failed.Change any field to change!');
        }
    }
}
