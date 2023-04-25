@extends('backend.layouts.master')
@section ('content')
<section class="content mt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Show Detail User</h3>
                           
            </div>
            
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>                  
                   
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <th scope="row">{{$result->id}}</th>
                        <td>{{$result->name}}</td>
                        <td>{{$result->email}}</td>
                       
                    </tr>
                 
                </tbody>                     
              </table>
             
              <a href="{{route('user.index')}}" class="btn btn-secondary mt-3">Back</a>

            </div>
            
          </div>  
        </div>
       
      </div>
     
    </div>
  
</section>

@endsection