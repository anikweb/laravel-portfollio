<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\icon;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.service.index',[
            'services' => Service::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.service.create',[
            'icons' =>icon::OrderBy('class','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'service_name' =>'required|unique:services,service_name',
            'summary' =>'required',
            'icon_name' =>'required'
        ]);
        $service = new Service;
        $service->service_name = $request->service_name;
        $service->summary = $request->summary;
        $service->icon_name = $request->icon_name;
        $service->save();
        return redirect()->route('service.index')->with('success','New Service Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.pages.service.edit',[
            'service' => Service::findOrFail($id),
            'icons' =>icon::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'service_name' => 'required|unique:services,service_name,'.$id,
            'summary' => 'required',
            'icon_name' => 'required'
        ]);
        $service = Service::findOrFail($id);
        $service->service_name = $request->service_name;
        $service->summary = $request->summary;
        $service->icon_name = $request->icon_name;
        $service->save();
        return redirect()->route('service.index')->with('success','Service Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'HELLLO '.$id;
        $service = Service::findOrFail($id);
        $service->delete();
        return back()->with('success','Service Deleted.');
    }
    public function getIcon($id){
        $icons = icon::find($id);
        $icon_class = $icons->class;
        return response()->json($icon_class);
    }
}
