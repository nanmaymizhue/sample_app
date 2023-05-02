@extends('backend.layouts.master')
@section('content')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Permission Listing</h3>

                            <a href="{{ route('permission.create') }}" class="btn btn-info float-right text-white">Add New</a>

                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $res)
                                        <tr>
                                            <th scope="row">{{ $res->id }}</th>
                                            <td>{{ $res->name }}</td>
                                            <td>
                                                <div class="d-flex flex-row">
                                                    <a href={{ route('permission.edit', $res->id) }}
                                                        class="btn btn-success mx-2">Edit</a>
                                                    <a href={{ route('permission.show', $res->id) }}
                                                        class="btn btn-primary">View</a>
                                                    <form method="POST"
                                                        action="{{ route('permission.destroy', $res->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger mx-2"
                                                            onclick="return confirm('Are you sure you want to delete this {{ $res->name }} permission?')">Delete</button>
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
