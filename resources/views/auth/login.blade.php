<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="img js-fullheight" style="background-image: url(images/bg_3.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login CRM Beauty Care</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">
							<a href="{{ route('register') }}" style="color: #fb930a">Doesn't have an account?</a> 
						</h3>
                  		<form action="{{ route('login') }}" method="POST" class="signin-form">
						@csrf	
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#" style="color: #fff">Forgot Password</a>
									</div>
							</div>
	          			</form>
		      		</div>
				</div>
			</div>
		</div>
	</section>    

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
