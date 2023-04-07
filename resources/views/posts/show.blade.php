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
        <div class="card" style="width:80%">
            <h4 class="card-header bg-secondary text-white">Show Detail Post</h4>
            <div class="card-body">
              <h4 class="card-title">{{$result->title}}</h4>
              <p class="card-text">{{$result->description}}</p>
              <div class="d-flex flex-row" style="justify-content: space-between">                
                @if($result->is_active == true)
                  <p>Status : <span class="text-success">Active</span><p>
                @else
                <p>Status : <span class="text-danger">Not Active</span></p>
                @endif
                <a href="{{route('posts.index')}}" class="btn btn-secondary">Back</a>
              </div>
            </div>
          </div>
    </div>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>    
</body>
</html>