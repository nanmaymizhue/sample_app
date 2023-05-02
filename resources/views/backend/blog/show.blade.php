
@extends('backend.layouts.master')
@section('content')

    <section class="content mt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Detail Blog</h3>                 
                </div>
                
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th> 
                            <th scope="col">Author</th>     
                        </tr>
                    </thead>
                    <tbody>                   
                        <tr>
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->name}}</td>
                            <td>
                              <img src="{{asset('storage/b_images/'.$blog->image)}}" alt="My Image" class="w-25 h-25">
                              {{-- <img src="{{asset('blog_images/'.$blog->image)}}" alt="My Image" class="w-25 h-25">                               --}}
                            </td>
                            <td>{{$blog->description}}</td>
                            <td>{{$blog->author->name}}</td>
                        </tr>                            
                    </tbody>
                    
                  </table>                  
                </div>
                <div class="card-footer">                   
                    <a href="{{route('blog.index')}}" class="btn btn-secondary float-right">Back</a>  
                  </div>
                
              </div>  
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection

       