<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $result = Post::all();
        return view('posts.index', compact('result'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->has('input_check') ? true : false
        ]);
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $result=Post::where('id',$id)->first();
        return view('posts.show',compact('result'));
    }


    public function edit($id)
    {
        $result = Post::where('id', $id)->first();

        return view('posts.edit',compact('result'));
    }


    public function update(Request $request, $id)
    {
        $result=Post::where('id',$id)->first();
        
        $result->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_active'=>$request->has('input_check')? true : false
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    { 
       
        $result=Post::where('id',$id)->first();
        $result->delete();
        return redirect()->route('posts.index');
   }
}
