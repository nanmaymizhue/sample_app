@extends('backend.layouts.master')
@section('content')

    <section class="content mt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold">Blog Listing</h3>
                  @can('blogCreate')
                  <a href="{{route('blog.create')}}" class="btn btn-info float-right text-white">Add New</a>  
                  @endcan                   
                </div>
                
                <div class="card-body">
                  <table id="dataTable" class="table table-bordered table-hover">
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
                                    @can('blogEdit')
                                      <a href="{{route('blog.edit',$val->id)}}" class="btn btn-success mx-2">Edit</a>
                                    @endcan
                                    @can('blogShow')
                                      <a href="{{route('blog.show',$val->id)}}" class="btn btn-primary">View</a>
                                    @endcan
                                    @can('blogDelete')
                                      <form method="POST" action="{{route('blog.delete',$val->id)}}">
                                          @csrf
                                          <button type="submit" class="btn btn-danger mx-2" onclick="return confirm('Are you sure you want to delete this {{$val->name}} blog?')">Delete</button>                               
                                      </form>
                                    @endcan
                                </div>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                     
                  </table>
                  {{-- {{$result->links()}}  --}}
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

       