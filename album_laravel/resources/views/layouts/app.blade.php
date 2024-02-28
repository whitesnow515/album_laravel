<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css" />
    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/dropzone/dist/dropzone-min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        .text1 {
            display: -webkit-box;
            -webkit-line-clamp:  2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var element = document.getElementById('dropzone-default');
            if (element !== null) {
                new Dropzone("#dropzone-default")
            }
        })
        
        function changePw() {

            $.ajax({
                url: '/users/changepw',
			    method: 'POST',
                data: $('#myPw').serialize(),
			    dataType: 'text',
                success: function(response) {
                    if (response == 'success') {
                        $('#changeModal').modal('hide');
                        window.location.reload();
                    }else{
                        if (response.indexOf("new") == -1) {
                            document.getElementById("newpw").innerHTML = '';
                            document.getElementById("oldpw").innerHTML = response;
                        }else{
                            document.getElementById("oldpw").innerHTML = '';
                            document.getElementById("newpw").innerHTML = response;
                        }
                    }
                },
                error: function(xhr, status, error){

                }
            });
        }
    </script>
    
    <style>
        .upload-drop-zone {
            height: 200px;
            border-width: 2px;
            margin-bottom: 20px;
        }
        .upload-drop-zone {
            color: #ccc;
            border-style: dashed;
            border-color: #ccc;
            line-height: 200px;
            text-align: center
        }
        .upload-drop-zone.drop {
            color: #222;
            border-color: #222;
        }
    </style>

</head>
<body>
    <div>
        <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
            <div class="m-header">
                <a href="/" class="b-brand" style="margin-right: 70px">
                    <img src="{{ asset('img/core-img/logo.png') }}" style="height: 40px" alt="" class="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/myalbum"><i class="fa fa-book"></i> Album</a>
                    </li>
                    <li>
                        @if (Auth::user()->name == 'admin')
                            <a href="/users"><i class="feather icon-users"></i> Users</a>
                        @endif
                    </li>
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/images/user/avatar-1.png') }}" style="height: 40px" class="img-radius" alt="User-Profile-Image">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <ul class="pro-body">
                                    <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#profileModal"><i class="feather icon-user"></i> Profile</a></li>
                                    <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#changeModal"><i class="feather icon-settings"></i> Change Password</a></li>
                                    <li>
                                        <a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="dropdown-item" title="Logout"
                                        >
                                            <i class="feather icon-log-out" style="margin-right: 14px"></i>Log out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
    </div>

    <div id="profileModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">My Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => 'UserController@update','method'=>'POST', 'id' => 'myProfile']) !!}
                        Name: <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}" name="name" placeholder="Name"/><br>
                        Email: <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Email"/>
                        <input type="hidden" id="user_id" value="{{ Auth::user()->id }}" name="user_id" />
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn  btn-primary" onclick="document.getElementById('myProfile').submit()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div id="changeModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="myPw">
                        @csrf
                        Old password: <input type="password" id="current-password" class="form-control" name="current-password"/><br>
                            <span class="error" style="color: red" id="oldpw"></span><br>
                        New password: <input type="password" id="password" class="form-control" name="password"/><br>
                            <span class="error" style="color: red" id="newpw"></span><br>
                        Confirm password: <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"/>
                        <input type="hidden" id="user_id" value="{{ Auth::user()->id }}" name="user_id" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn  btn-primary" onclick="changePw()">Change</button>
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <main class="p-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
