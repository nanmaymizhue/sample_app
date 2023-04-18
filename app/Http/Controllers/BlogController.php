<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $result = Blog::all();
        return view('blog.index',compact('result'));
    }

    public function create(){
        return view('blog.create') ; 
    }

    public function store(BlogRequest $request){

        $data = $request->validated();
        Blog::create($data);
   
    //    $request -> validate([
    //     'name'=>'required',
    //     'description'=>'required'
    //    ]);
    //    Blog::create($request->all());

       return redirect()->route('blog.index');
    }

    public function edit(Blog $blog){
        return view('blog.edit',compact('blog'));
    }

    public function update(BlogRequest $request,Blog $blog){
       
        $data = $request->validated();
        $blog->update($data);

        // $request->validate([
        //     'name'=>'required',
        //     'description'=>'required',
        // ]);
        //  $blog->update($request->all());

        return redirect()->route('blog.index');

    }

    public function delete(Blog $blog){
        $blog->delete();
        return redirect()->route('blog.index');
    }

    public function show(Blog $blog){
        return view('blog.show',compact('blog'));
    }
}
