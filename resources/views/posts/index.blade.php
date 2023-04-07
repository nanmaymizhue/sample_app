<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>    
    <div class="container mt-5">
        <h3>Posts List</h3>
        <a href="{{route('posts.create')}}" class="btn btn-primary my-3">Add Post</a>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($result as $res)
                    <tr>
                        <td>{{$res->id}}</td>
                        <td>{{$res->title}}</td>
                        <td>{{$res->description}}</td>
                        @if($res->is_active == true)
                        <td class>
                           <p class="text-success">Active</p>                         
                        </td>                        
                        @else
                        <td>
                            <p class="text-danger">Not Active</p>                        
                        </td> 
                        @endif 
                        <td>
                          <div class="d-flex flex-row">
                            <a href="{{route('posts.edit',$res->id)}}" class="btn btn-success mx-2">Edit</a>
                            <a href="{{route('posts.show',$res->id)}}" class="btn btn-secondary">View</a>                           
                            
                            <form method="POST" action="{{route('posts.destroy',$res->id)}}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger mx-2" onclick="return confirm('Are you sure you want to delete this {{$res->title}} post?')">Delete</button>
                            </form>  
                          </div>                                                

                        </td>                  
                    </tr>
                   
                @endforeach       
            </tbody>
          </table>                
             
    </div>
   
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>