@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Post</h3>
                    </div>

                    <form method="POST" action="{{ route('posts.update', $result->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ $result->title }}">
                                @if ($errors->has('title'))
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5">{{ $result->description }}</textarea>
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
                                @if ($result->is_active == true)
                                    <input class="form-check-input" type="checkbox" name="is_active" id="flexCheckDefault"
                                        checked>
                                @else
                                    <input class="form-check-input" type="checkbox" name="is_active" id="flexCheckDefault">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">Active</label>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                </div>
                </form>
            </div>

        </div>

    </div>

    </div>
@endsection
