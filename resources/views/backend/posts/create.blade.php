@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Post</h3>
                    </div>

                    <form id="quickForm" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image"
                                    value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="is_active" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Active</label>
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
