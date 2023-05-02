<?php
namespace App\Repository\Post;

interface PostRepoInterface{
    public function get();
    public function show($id);
} 
