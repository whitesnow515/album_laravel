@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
	<h2>User List</h2>
    <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#addModal" style="width: 92px">Add</button>
</div>

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">User List</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->useflag == 1)
                                <a style="color: red" href="{{ route('users.allow', ['id' => $user->id]) }}">Unallow</a>
                                @else
                                <a style="color: blue" href="{{ route('users.allow', ['id' => $user->id]) }}">Allow</a>
                                @endif 
                            </td>
                            <td>
                                <a href="{{ route('users.destory', ['id' => $user->id]) }}">Delete</a>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No User Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $users->links() }}

            </div>
        </div>
    </div>    
</div>

<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <hr>
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('register') }}" id="myForm" >
                        @csrf 
                        <div class="form-group mb-3">
                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>    
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                    </form>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary" onclick="document.getElementById('myForm').submit()">Add</button>
            </div>
        </div>
    </div>
</div>
@endsection