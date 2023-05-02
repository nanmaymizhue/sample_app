<?php

namespace App\Repository\Post;
use App\Models\Post;


class PostRepository implements PostRepoInterface{
    public function get(){
        $result = Post::all();
        return $result;  
    }

    public function show($id){
        $result = Post::where('id',$id)->first();
        return $result;
    }
}