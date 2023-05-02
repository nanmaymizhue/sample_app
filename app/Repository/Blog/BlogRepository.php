<?php

namespace App\Repository\Blog;
use App\Models\Blog;

class BlogRepository implements BlogRepoInterface{
    public function get(){
        $result=Blog::with('author')->orderby('id','desc')->get(); 
        return $result;  
    }

    public function show($id){
        $result = Blog::where('id',$id)->first();
        return $result;
    }
}