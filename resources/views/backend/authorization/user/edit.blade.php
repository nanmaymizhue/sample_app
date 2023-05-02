@extends('backend.layouts.master')
@section('content')
    <div class="contcdainer-fluid mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>

                    <form id="quickForm" method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" id="name" placeholder="Enter User Name">
                                @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" id="name" placeholder="Enter Email">
                                @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-select" name="role" aria-label="Default select example">
                                    @foreach ($role as $r)
                                        <option value="{{ $r->id }}" {{ $user->hasRole($r->id) ? 'selected' : '' }}>
                                            {{ $r->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                    <small class="text-danger">{{ $errors->first('role') }}</small>
                                @endif
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
