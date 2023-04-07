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
        <div class="card mx-auto p-3" style="width: 40%;">
            <h4 class="text-center">Add New Post</h4>
            <form method="POST" action="{{route('posts.store')}}">
                @csrf
                <div class=" form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                </div class="form-group mb-3">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="input_check" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Active</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{route('posts.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div> 
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>