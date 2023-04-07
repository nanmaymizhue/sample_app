<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //   @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        $data = Blog::all();

        return view('blogs.index',compact('data'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('blogs.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
       //dd($request->all());
    //   Blog::create([
    //     'name'=>$request->name,
    //     'description'=>$request->description,

    //   ]);

      //(or)

      Blog::create($request->all());
      return redirect()->route('blogs.index');

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        //dd($id);
        $result = Blog::where('id',$id)->first();
        return view('blogs.show',compact('result'));

    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $result = Blog::where('id',$id)->first();
        return view('blogs.edit',compact('result'));      
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        $data = Blog::where('id',$id)->first();

        // $data->update([
        //     'name'=>$request->name,
        //     'description'=>$request->description,
        //     'image'=>'',
        // ]);
        //(or)

        $data->update($request->all());

        return redirect()->route('blogs.index');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $result=Blog::where('id',$id)->first();
        $result->delete();
        return redirect()->route('blogs.index');
    }
}
