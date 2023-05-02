@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Show Detail Post</h3>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Title : {{ $result->title }}</h4>
                        <p class="card-text">Description : {{ $result->description }}</p>
                        <div>
                            <img src="{{ asset('storage/post_images/' . $result->image) }}" class="w-25 h-25" alt="Image">
                        </div>
                        <div class="d-flex flex-row mt-2" style="justify-content: space-between">
                            @if ($result->is_active == true)
                                <p>Status : <span class="text-success">Active</span>
                                <p>
                                @else
                                <p>Status : <span class="text-danger">Not Active</span></p>
                            @endif

                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary float-right">Back</a>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
