<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repository\Post\PostRepoInterface;
use App\Services\Post\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $postRepo,$postService;
    public function __construct(PostRepoInterface $postRepo,PostServiceInterface $postService){
        $this->postRepo=$postRepo;
        $this->postService=$postService;
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $result = Post::all();
       $result= $this->postRepo->get();
        return view('backend.posts.index', compact('result'));
    }

    public function create()
    {
        return view('backend.posts.create');
    }


    public function store(PostRequest $request)
    {
         $validData=$request->validated();

         $this->postService->store($validData);

        // if($request->hasFile('image')){
        //     $imageName = time().'.'.$request->image->extension();                    
        //     $request->image->storeAs('public/post_images', $imageName);
        //     $validData['image']=$imageName;          
        //  }

        // $validData['is_active'] =$request->has('is_active')? true : false;
        // Post::create($validData);

        return redirect()->route('posts.index');

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image'=>"imagesdaa",
        //     'is_active' => $request->has('is_active') ? true : false
        // ]);
       
    }

    public function show($id)
    {
        $result=$this->postRepo->show($id);
        // $result=Post::where('id',$id)->first();
        return view('backend.posts.show',compact('result'));
    }


    public function edit($id)
    {
        $result = Post::where('id', $id)->first();

        return view('backend.posts.edit',compact('result'));
    }


    public function update(PostRequest $request, $id)
    {
        $validData=$request->validated();
    
        $this->postService->update($validData,$id);
        //$result=Post::where('id',$id)->first(); 
        // if($request->hasFile('image')){

        //     // if(Storage::exists('public/post_images/'.$result->image)){
        //         //Storage::delete('public/post_images'.$result->image);
        //     // }
        //     Storage::delete('public/post_images/'.$result->image);

        //     $imageName = time().'.'.$request->image->extension();
        //     $request->image->storeAs('public/post_images',$imageName);
        //     $validData['image']=$imageName;        
        // }

        //  $validData['is_active']=$request->has('is_active')? true : false;
        //  $result->update($validData);

         return redirect()->route('posts.index');

        // $result->update([
        //     'title'=>$request->title,
        //     'description'=>$request->description,
        //     'is_active'=>$request->has('input_check')? true : false
        // ]);
        
    }

    public function destroy($id)
    {
        $this->postService->destroy($id);
        // $result=Post::where('id',$id)->first();
        // Storage::delete('public/post_images/'.$result->image) ; 
        // $result->delete();
        return redirect()->route('posts.index');
   }
}
