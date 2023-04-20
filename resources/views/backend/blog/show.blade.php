
@extends('backend.layouts.master')
@section('content')

    <section class="content mt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
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
                </div>
                <div class="card-footer">                   
                    <a href="{{route('blog.index')}}" class="btn btn-secondary">Back</a>  
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

       