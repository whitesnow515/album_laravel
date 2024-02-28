<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register - {{ config('app.name') }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <div class="card borderless">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="f-w-400">Sign Up</h4>
                            <hr>
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('register') }}" >
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
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
                                </form>
                            <hr>
                            <p class="mb-2">Already have an account? <a href="/login" class="f-w-400">Signin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
