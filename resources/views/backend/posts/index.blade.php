@extends('backend.layouts.master')

@section('content')  
    <section class="content mt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">Post Listing</h3>
               
                <a href="{{route('posts.create')}}" class="btn btn-primary float-right text-white">+ Add New</a>  
                                
              </div>
              
              <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Image</th>
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
                              <td>
                                <img src="{{asset('storage/post_images/'.$res->image)}}" alt="Image" class="w-25 h-25">
                              </td>
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
              
            </div>  

          </div>
        
        </div>
    
      </div>

  </section>
@endsection 