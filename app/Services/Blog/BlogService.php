<?php

namespace App\Services\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogService implements BlogServiceInterface
{
    public function store($request)
    {

        if ($request['image']) {
            $imageName = time() . '.' . $request['image']->extension();
            $request['image']->move(public_path('blog_images'), $imageName);
            $request['image'] = $imageName;
        }
        return Blog::create($request);

        // if ($request['image']) {
        //     $imageName = time() . '.' . $request['image']->extension();
        //     $request['image']->storeAs('public/b_images', $imageName);
        //     $request['image'] = $imageName;
        // }
        // return Blog::create($request);

    }

    public function update($request, $id)
    {
        $blog = Blog::where('id', $id)->first();

        $originalImage = public_path('blog_images/') . $blog->image;
        if ($request['image'] ?? false) {
            if (file_exists($originalImage)) {
                unlink($originalImage);
            }
            $imageName = time() . '.' . $request['image']->extension();
            $request['image']->move(public_path('blog_images'), $imageName);
            $request['image'] = $imageName;
        }
        return $blog->update($request);


        // if ($request['image'] ?? false) {
        //     Storage::delete('public/b_images/' . $blog->image);
        //     $imageName = time() . '.' . $request['image']->extension();
        //     $request['image']->storeAs('public/b_images', $imageName);
        //     $request['image'] = $imageName;
        // }
        // return $blog->update($request);

    }

    public function delete($id)
    {
        $blog = Blog::where('id', $id)->first();
        $originalImage = public_path('blog_images/') . $blog->image;
        unlink($originalImage);
        return $blog->delete();
    }
}
