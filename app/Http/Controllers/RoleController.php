<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.role.index',[
            'roles' =>Role::orderBy('name','asc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Permission::create(['name'=>'view testimonial']);
        // return 'added';

        return view('backend.pages.role.create',[
            'permissions' =>Permission::orderBy('name','asc')->get(),
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
        $role=Role::create(['name'=>$request->role_name]);
        $role->givePermissionTo($request->permissions);
        return redirect()->route('role.index')->with('success','New Role Created!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function assignUser()
    {
        return view('backend.pages.role.assign_user',[
            'users' =>User::orderBy('name','asc')->get(),
            'roles' =>Role::orderBy('name','asc')->get(),
        ]);
    }
    public function assignUserPost(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->assignRole($request->role_name);
        return back();
    }

}
