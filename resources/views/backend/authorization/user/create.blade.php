@extends('backend.layouts.master')
@section('content')
<div class="container-fluid mt-5">
    <div class="row">        
        <div class="col-md-8 m-auto">            
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New User</h3>
                </div>
                    
                <form id="quickForm" method="POST" action="{{route('user.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Enter User Name">
                            @if($errors->has('name'))
                                <small class="text-danger">{{$errors->first('name')}}</small>
                            @endif                    
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control"  value="{{old('email')}}" id="name" placeholder="Enter Email">
                            @if($errors->has('email'))
                                <small class="text-danger">{{$errors->first('email')}}</small>
                            @endif                    
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{old('password')}}" id="password" placeholder="Enter Password">
                            @if($errors->has('password'))
                                <small class="text-danger">{{$errors->first('password')}}</small>
                            @endif                    
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"  value="{{old('confirm_password')}}" id="confirm_password" placeholder="Enter Confirm Password">
                            @if($errors->has('password_confirmation'))
                                <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
                            @endif                    
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-select" name="role" aria-label="Default select example">                                
                                @foreach($role as $r)                                    
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('role'))
                                <small class="text-danger">{{$errors->first('role')}}</small>
                            @endif                    
                        </div>
                                              
                    </div>            
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{route('user.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
           </div>
        
        </div>
        
    </div>
        
</div>    
@endsection