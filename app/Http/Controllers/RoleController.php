<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('permission:roleList',['only'=>['index,create,store,show,edit,update,delete']]);
        $this->middleware('auth');
     }
    public function index()
    {
        $result = Role::all();
        return view('backend.authorization.role.index', compact('result'));
    }

    public function create()
    {
        $result = Permission::all();
        return view('backend.authorization.role.create', compact('result'));
    }


    public function store(RoleRequest $request)
    {
        $validData=$request->validated();

        $role = Role::create($validData);

        
        $role->givePermissionTo($validData['permissions']);

        return redirect()->route('role.index');
        

        // $role = Role::create([
        //     'name'=>$validData['name']
        // ]);

        // $permission = Permission::whereIn('id', $request->input('permissions'))->get();
        //$ $role->givePermissionTo($permission);
    }

    public function show($id)
    {
        $result = Role::where('id', $id)->first();
        return view('backend.authorization.role.show', compact('result'));
    }

    public function edit($id)
    {
        $role = Role::where('id',$id)->first();
        $permission = Permission::all();
        return view('backend.authorization.role.edit', compact('role', 'permission'));
    }

    public function update(Request $request, $id)
    {
        $validData=$request->validate([
            'name'=>'required|string|unique:roles,name,'.$id,
            'permissions'=>'required',
        ]);
       
        $role=Role::where('id',$id)->first();

        $role->update($validData);

        $role->syncPermissions($validData['permissions']);

        return redirect()->route('role.index');

        // $permission= Permission::whereIn('id', $request->input('permissions'))->get();
        // or
        // $permission=$request->input('permissions');    
    }

    public function destroy($id)
    {
        $result = Role::where('id', $id)->first();
        $result->delete();
        return redirect()->route('role.index');
    }
}
