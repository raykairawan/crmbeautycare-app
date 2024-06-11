<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Registration</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('imagesfavicon-32x32.png') }}" type="image/png" sizes="32x32">
    <link rel="icon" href="{{ asset('favicon-16x16.png" type="image/png') }}" sizes="16x16">

    <!-- Main CSS-->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" media="all">
</head>
<body>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <img src="{{ asset('images/Logo.png') }}" class="img" alt="TS Beauty Care">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Your Name</label>
                                    <input class="input--style-4" type="text" name="name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <div class="input-group-icon">
                                        <input id="password-field" class="input--style-4" type="password" name="password" placeholder="Password" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password input-icon"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password Confirmation</label>
                                    <div class="input-group-icon">
                                        <input id="password-field2" class="input--style-4" type="password" name="password" placeholder="Password Confirmation" required>
                                        <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password input-icon"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="number" name="phone" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" name="city" placeholder="City" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Postal Code</label>
                                    <input class="input--style-4" type="number" name="postal_code" placeholder="Postal Code">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Image</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input class="input--style-4" type="file" name="img_url">
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS-->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
