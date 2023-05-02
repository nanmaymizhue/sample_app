<?php 

namespace App\Services\Post;

interface PostServiceInterface{
    public function store($request);

    public function update($request,$id);

    public function destroy($id);
}