@extends('backend.layouts.master')
@section('content')
<div class="container-fluid mt-5">
    <div class="row">        
        <div class="col-md-8 m-auto">            
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Role</h3>
                </div>
                    
                <form id="quickForm" method="POST" action="{{route('role.update',$role->id)}}">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$role->name}}" id="name">
                            @if($errors->has('name'))
                                <small class="text-danger">{{$errors->first('name')}}</small>
                            @endif                    
                        </div>
                        
                        <div class="card p-2">                
                            @foreach($permission as $per)              
                            <div class="form-check m-2">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$per->id}}" id="flexCheckChecked" {{$role->hasPermissionTo($per->id)? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{$per->name}}
                                </label>                               
                            </div>
                            @endforeach
                        </div>
                        @if($errors->has('permissions'))
                            <small class="text-danger">{{$errors->first('permissions')}}</small>
                         @endif  
                                                      
                    </div>            
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('role.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
           </div>
        
        </div>
        
    </div>
        
</div>    
@endsection