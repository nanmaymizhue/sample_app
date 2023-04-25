@extends('backend.layouts.master')
@section('content')
<div class="container-fluid mt-5">
    <div class="row">        
        <div class="col-md-8 m-auto">            
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Role</h3>
                </div>
                    
                <form id="quickForm" method="POST" action="{{route('role.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter Role Name">
                            @if($errors->has('name'))
                                <small class="text-danger">{{$errors->first('name')}}</small>
                            @endif                    
                        </div>
                        <div class="card p-2"> 
                            <div class="row m-2">
                                @foreach($result as $res)              
                                <div class="form-check col-sm-6 p-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$res->id}}" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        {{$res->name}}
                                    </label>                                   
                                </div>    
                                @endforeach
                            </div>                            
                        </div>
                        @if($errors->has('permissions'))
                            <small class="text-danger">{{$errors->first('permissions')}}</small>
                        @endif 
                                                      
                    </div>            
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{route('role.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
           </div>
        
        </div>
        
    </div>
        
</div>    
@endsection