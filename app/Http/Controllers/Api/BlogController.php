<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Services\Blog\BlogServiceInterface;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    public function __construct(BlogServiceInterface $blogService){
        $this->blogService =$blogService;
    }

    public function index()
    {
        try {
            $data = Blog::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Blog List All',
                'data' => $data,

            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data,
            ], 500);
        }
    }


    public function store(BlogRequest $request)
    {
        try {
            $data = $this->blogService->store($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Create Blog Success',
                'data' => $data

            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data

            ], 500);
        }
    }


    public function show($id)
    {
        try {
            $data = Blog::where('id', $id)->first();
            return response()->json([               
                'status' => 'success',
                'message' => 'Show Blog',
                'data' => $data

            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data

            ], 500);
        }
    }


    public function update(BlogRequest $request, $id)
    {
        try{
            $validData=$request->validated();
            $data=$this->blogService->update($validData,$id);
            return response()->json([               
                'status' => 'success',
                'message' => 'Update Blog Success',
                'data' => $data

            ], 200);
        
        }catch(Exception $e){
            return response()->json([               
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data

            ], 500);
        }
    }

    public function destroy($id)
    {        
        try{         
            $data=$this->blogService->delete($id);
            return response()->json([               
                'status' => 'success',
                'message' => 'Delete Blog Success',
                'data' => $data

            ], 200);
        
        }catch(Exception $e){
            return response()->json([               
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => $data

            ], 500);
        }
    }
}
