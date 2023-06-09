@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Blog</h3>
                    </div>

                    <form id="quickForm" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Name">
                                @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description"
                                    placeholder="Enter Description">
                                @if ($errors->has('description'))
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    placeholder="Enter Image">
                                @if ($errors->has('image'))
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <select class="form-select" name="author_id" aria-label="Default select example">                                
                                    @foreach($author as $a)
                                        <option value={{$a->id}}>{{$a->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('author_id'))
                                    <small class="text-danger">{{$errors->first('author_id')}}</small>
                                @endif                    
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
