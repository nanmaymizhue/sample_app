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
        <a href="{{route('blog.create')}}" class="btn btn-info">Add New</a>       

       <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $val)
                    <tr>
                        <th scope="row">{{$val->id}}</th>
                        <td>{{$val->name}}</td>
                        <td>{{$val->image}}</td>
                        <td>{{$val->description}}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href="{{route('blog.edit',$val->id)}}" class="btn btn-success mx-2">Edit</a>
                                <a href="{{route('blog.show',$val->id)}}" class="btn btn-primary">View</a>
                                <form method="POST" action="{{route('blog.delete',$val->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger mx-2">Delete</button>                               
                                </form>
                            </div>
                          
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
       </div>


<script src="{{ asset('js/bootstrap.min.js') }}" integrity="" crossorigin="anonymous"></script>


 </body>
</html>

    
</body>
</html>