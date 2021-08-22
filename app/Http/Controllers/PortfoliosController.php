<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolios;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PortfoliosController extends Controller
{
    public function PortfolioView(){
        return view('backend.pages.Portfolio.index',[
            'portfolios'=>Portfolios::latest()->paginate(10),
        ]);
    }
    public function PortfolioAdd(){
        return view('backend.pages.Portfolio.create');
    }
    public function PortfolioPost(Request $request){
        $request->validate([
            'title' => 'required|unique:portfolios',
            'summary' => 'required|max:300',
            'description' => 'required|max:500',
            'using_technology' => 'required',
            'type' => 'required',
            'thumbnail' => 'required|mimes:jpg,png,svg,webp',
        ]);
        $portfolio = new Portfolios;
        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title);
        $portfolio->summary = $request->summary;
        $portfolio->description = $request->description;
        $portfolio->using_technology = $request->using_technology;
        $portfolio->type = $request->type;
        $image = $request->file('thumbnail');
        $portfolio->save();

        $path1 = public_path('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/';
        File::makeDirectory($path1, 0777, true);

        $newThumbnailName = Str::slug($portfolio->title).'-'.Str::random(5).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save($path1.$newThumbnailName,70);
        $portfolio->thumbnail = $newThumbnailName;
        $portfolio->save();
        return redirect()->route('PortfolioView')->with('success','New Portfolio Added.');
    }
    public function PortfolioDetails($slug){

        return view('backend.pages.Portfolio.show',[
            'portfolio' => Portfolios::where('slug',$slug)->first(),
        ]);
    }
    public function PortfolioEdit($slug){
        return view('backend.pages.Portfolio.edit',[
            'portfolio' => Portfolios::where('slug',$slug)->first(),
        ]);
    }
    public function PortfolioUpdate(Request $request){
        $portfolio = Portfolios::where('slug',$request->portfolio_slug)->first();
        // return $request->portfolio_slug;
        if($portfolio->title == $request->title && $portfolio->summary == $request->summary && $portfolio->description == $request->description && $portfolio->using_technology == $request->using_technology && $portfolio->type == $request->type){
            return back()->with('fail','You did not change to update.');
        }
        $request->validate([
            'title' => 'required|unique:portfolios,title,'.$portfolio->id,
            'summary' => 'required|max:300',
            'description' => 'required|max:500',
            'using_technology' => 'required',
            'type' => 'required',
        ]);
        if($request->hasFile('thumbnail')){
            $request->validate([
                'thumbnail' => 'mimes:png,jpg,svg,webp'
            ]);
        }
        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title);
        $portfolio->summary = $request->summary;
        $portfolio->description = $request->description;
        $portfolio->using_technology = $request->using_technology;
        $portfolio->type = $request->type;
        $image = $request->file('thumbnail');
        $portfolio->save();

        if($request->hasFile('thumbnail')){
            $oldthumbnail = public_path('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/'.$portfolio->thumbnail;
            if(file_exists($oldthumbnail)){
                unlink($oldthumbnail);
            }
            $path1 = public_path('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/';
            File::makeDirectory($path1, $mode = 0777, true, true);

            $newThumbnailName = Str::slug($portfolio->title).'-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save($path1.$newThumbnailName,70);
            $portfolio->thumbnail = $newThumbnailName;
        }
        $portfolio->save();
        return redirect()->route('PortfolioView')->with('success','Portfolio Updated');
    }
    public function PortfolioDelete($slug){
        $portfolio = Portfolios::where('slug',$slug)->first()->delete();
        return back()->with('success','Portfolio Deleted.');

    }
}
