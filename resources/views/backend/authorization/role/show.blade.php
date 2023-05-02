@extends('backend.layouts.master')
@section('content')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Show Detail Role</h3>

                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $result->id }}</th>
                                        <td>{{ $result->name }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($result->permissions as $per)
                                                    <li class="m-2">{{ $per->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                            <a href="{{ route('role.index') }}" class="btn btn-secondary mt-3">Back</a>


                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>
@endsection
