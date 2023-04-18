<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
</head>
<body>
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
        <h3>Blog Listing</h3> 
       <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>    
                    </tr>
                </thead>
                <tbody>                   
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->name}}</td>
                        <td>{{$blog->image}}</td>
                        <td>{{$blog->description}}</td>
                    </tr>                            
                </tbody>
            </table>
            <a href="{{route('blog.index')}}" class="btn btn-secondary">Back</a>  
       </div>


<script src="{{ asset('js/bootstrap.min.js') }}" integrity="" crossorigin="anonymous"></script>


 </body>
</html>

    
</body>
</html>