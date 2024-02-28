<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - {{ config('app.name') }}</title>
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
				<div class="row align-items-center ">
					<div class="col-md-12">
						<div class="card-body">
							<h4 class="mb-3 f-w-400">Sign In</h4>
							<hr>
							<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
								@csrf 
								<div class="form-group mb-3">
									<input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control rounded-left @error('email')" placeholder="Email" required>
									<!-- @if ($errors->has('email'))
										<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif -->
								</div>
								<div class="form-group mb-4">
									<input type="password" class="form-control rounded-left @error('password')" id="password" name="password" placeholder="Password" required>
									<!-- @if ($errors->has('password'))
										<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif -->
								</div>
								
								@if ($errors->any())
									<div class="alert alert-danger text-left">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<div class="custom-control custom-checkbox text-left mb-4 mt-2">
									<input type="checkbox" class="custom-control-input" id="customCheck1">
									<label class="custom-control-label" for="customCheck1">Save credentials.</label>
								</div>
								<button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
							</form>
							<hr>
							<p class="mb-0 text-muted">Don’t have an account? <a href="/register" class="f-w-400">Signup</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
