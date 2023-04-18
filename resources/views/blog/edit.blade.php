
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

       
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">       


        
    </head>
    <body class="antialiased">
       <div class="container mt-5">  
            <h3>Edit Blog</h3> 
            
            <form method="POST" action="{{route('blog.update',$blog->id)}}">
                @csrf          
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" id="name" value="{{$blog->name}}">
                    @if($errors->has('name'))
                        <small class="text-danger">{{$errors->first('name')}}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="desc" value="{{$blog->description}}">
                    @if($errors->has('description'))
                        <small class="text-danger">{{$errors->first('description')}}</small>
                    @endif
                </div>
    
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('blog.index')}}" class="btn btn-secondary">Cancel</a>
            </form>  
       </div>


<script src="{{ asset('js/bootstrap.min.js') }}" integrity="" crossorigin="anonymous"></script>


 </body>
</html>

    
</body>
</html>