<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Author;
use App\Models\Blog;
use App\Repository\Blog\BlogRepoInterface;
use App\Services\Blog\BlogServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    private $blogRepo,$blogService;
    public function __construct(BlogRepoInterface $blogRepo,BlogServiceInterface $blogService){

        $this->blogRepo=$blogRepo;
        $this->blogService=$blogService;

        $this->middleware('permission:blogList',['only'=>['index']]);
        $this->middleware('permission:blogCreate',['only'=>['create','store']]);
        $this->middleware('permission:blogEdit',['only'=>['edit','update']]);
        $this->middleware('permission:blogDelete',['only'=>['destroy']]);
        $this->middleware('permission:blogShow',['only'=>['show']]);
        $this->middleware('auth');
    }
    public function index(){
        $result=$this->blogRepo->get();        
        return view('backend.blog.index',compact('result'));
    }

    public function create(){
        $author=Author::all();       
        return view('backend.blog.create',compact('author')) ; 
    }

    public function store(BlogRequest $request){

        $data = $request->validated();
        $this->blogService->store($data);
                 
       //upload file to storage
        // if($request->hasFile('image')){
        //     $imageName = time().'.'.$request->image->extension();                    
        //     $request->image->storeAs('public/b_images', $imageName);
        //     $data['image']=$imageName;  
        // }


        //upload file to public //
        // if($request->hasFile('image')){
        //     $imageName= time().'.'.$request->image->extension();
        //     $request->image->move(public_path('blog_images'),$imageName);
        //     $data['image']=$imageName; 
        // }
        //  Blog::create($data);   

   
        //    Blog::create($request->all());//

         return redirect()->route('blog.index');
    }

    public function edit(Blog $blog){
        $author=Author::all();       
        return view('backend.blog.edit',compact('blog','author'));
    }

    public function update(BlogRequest $request,Blog $blog){       
       
        $data = $request->validated();
         $this->blogService->update($data,$blog->id);

        //upload image file using storage//
        // if($request->hasFile('image')){
        //   Storage::delete('public/b_images/'.$blog->image);
        //   $imageName= time().'.'.$request->image->extension();
        //   $request->image->storeAs('public/b_images',$imageName);
        //   $data['image']=$imageName;
        // }

        //upload image file to public //
        // if($request->hasFile('image')){
        //     $originalImage=public_path('blog_images/').$blog->image;
        //     if(file_exists($originalImage)){
        //         unlink($originalImage);
        //     }  
        //     $imageName= time().'.'.$request->image->extension();
        //     $request->image->move(public_path('blog_images'),$imageName);
        //     $data['image']=$imageName;
        //   }
       
        // $blog->update($data);

        
        //  $blog->update($request->all());//

        return redirect()->route('blog.index');

    }

    public function delete(Blog $blog){ 
        $this->blogService->delete($blog->id);  

        // $originalImage=public_path('blog_images/').$blog->image;
        // unlink($originalImage);

        // Storage::delete('public/b_images/'.$blog->image);//
        // $blog->delete();
        
        return redirect()->route('blog.index');
    }

    public function show(Blog $blog){
        $blog=$this->blogRepo->show($blog->id);
        return view('backend.blog.show',compact('blog'));
    }
}
