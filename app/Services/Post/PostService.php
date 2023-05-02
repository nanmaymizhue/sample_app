<?php

namespace App\Services\Post;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService implements PostServiceInterface
{
    public function store($request)
    {
        if($request['image']?? false){
            $imageName = time().'.'.$request['image']->extension();                    
            $request['image']->storeAs('public/post_images', $imageName);
            $request['image']=$imageName;          
         }
        $request['is_active'] =isset($request['is_active'])? true : false;//for is_active set nullable with validation
        return Post::create($request);

    }

    public function update($request,$id){
        $post=Post::where('id',$id)->first();
        if($request['image']?? false){

            if(Storage::exists('public/post_images/'.$post->image)){
                Storage::delete('public/post_images'.$post->image);
            }
            Storage::delete('public/post_images/'.$request['image']);

            $imageName = time().'.'.$request['image']->extension();
            $request['image']->storeAs('public/post_images',$imageName);
            $request['image']=$imageName;        
        }

        $request['is_active'] =isset($request['is_active'])? true : false;
        return $post->update($request);
    }

    public function destroy($id){
        $result=Post::where('id',$id)->first();
        Storage::delete('public/post_images/'.$result->image) ; 
        return $result->delete();
    }
}