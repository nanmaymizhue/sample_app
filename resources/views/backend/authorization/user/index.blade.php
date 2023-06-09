@extends('backend.layouts.master')
@section('content')
    <section class="content mt-3">
        <div class="container-fluid">

            @if ($errors->has('errorMessage'))
                <p class="text-danger" id="errorMessage">{{ $errors->first('errorMessage') }}</p>
                <script>
                    setTimeout(function() {
                        document.getElementById("errorMessage").style.display = "none";
                    }, 5000);
                </script>
            @endif


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">User Listing</h3>

                            <a href="{{ route('user.create') }}" class="btn btn-info float-right text-white">Add New</a>

                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $res)
                                        <tr>
                                            <th scope="row">{{ $res->id }}</th>
                                            <td>{{ $res->name }}</td>
                                            <td>{{ $res->email }}</td>
                                            <td>
                                                @if (!empty($res->getRoleNames()))
                                                    @foreach ($res->getRoleNames() as $role)
                                                        <span class="badge badge-primary">{{ $role }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex flex-row">
                                                    <a href={{ route('user.edit', $res->id) }}
                                                        class="btn btn-success mx-2">Edit</a>
                                                    <a href={{ route('user.show', $res->id) }}
                                                        class="btn btn-primary">View</a>
                                                    <form method="POST" action="{{ route('user.destroy', $res->id) }}">
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
