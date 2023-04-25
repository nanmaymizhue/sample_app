<?php

namespace App\Http\Controllers;


use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
   
    public function index()
    {
        $result=Permission::all();  
        return view('backend.authorization.permission.index',compact('result'));    
    }

   
    public function create()
    {
        return view('backend.authorization.permission.create');    
    }


    public function store(PermissionRequest $request)
    {
        $validData=$request->validated();
        Permission::create($validData);
        return redirect()->route('permission.index');
    }

   
    public function show($id)
    {
      $result=Permission::where('id',$id)->first();
      return view('backend.authorization.permission.show',compact('result'));
    }

   
    public function edit($id)
    {
        $result=Permission::where('id',$id)->first();
        return view('backend.authorization.permission.edit',compact('result'));
    
    }

    public function update(PermissionRequest $request, $id)
    {
        $validData=$request->validated();
        $result=Permission::where('id',$id)->first();       
        $result->update($validData);
        return redirect()->route('permission.index');
    }
  
    public function destroy($id)
    {
       $result=Permission::where('id',$id)->first();
       $result->delete();
       return redirect()->route('permission.index');
    }
}
