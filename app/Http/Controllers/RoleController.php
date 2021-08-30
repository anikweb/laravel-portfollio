<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        // Permission::create(['name'=>'customer']);
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
        $request->validate([
            'role_name' => 'required|unique:roles,name',
            'permissions[]' =>'required',
        ],[
            'permissions[].required'=>'Permission Required to creating role.'
        ]);
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
        return view('backend.pages.role.show',[
           'role' => Role::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('backend.pages.role.edit',[
            'role' => Role::findOrFail($id),
            'permissions' => Permission::orderBy('name','asc')->get(),
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
        // return $request->role_name;
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permissions);
        return back()->with('success',$role->name.' Role Updated.');
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
        $request->validate([
            'user_id' => 'required',
            'role_name'=> 'required'
        ]);
        $user = User::findOrFail($request->user_id);
        $user->assignRole($request->role_name);
        $rolename = Str::title($request->role_name);
        return back()->with('success',$user->name.' Assigned as a '.$rolename);
    }

    public function userRoleEdit($id)
    {

       return view('backend.pages.role.user_role_edit',[
        'user' => User::findOrFail($id),
        'roles' => Role::orderBy('name','asc')->get(),
       ]);
    }
    public function userRoleEditPost(Request $request){
        if($request->current_role || $request->new_role){
            $user = User::findOrFail($request->user_id);
            if($request->current_role){
                foreach ($request->current_role as $current_role) {
                    $user->removeRole($current_role);
                }
            }
            $user->assignRole();
            $rolename = Str::title($request->role_name);
            return redirect()->route('assign.user')->with('success','role updated');
        }else{
            return back()->with('fail','You did not change to update.');
        }
        // return $request;

    }
}
