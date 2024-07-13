<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Payment</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style3.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <span>
              TS Beauty Care
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('users.dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('categories.all') }}"> Categories </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('products.all') }}">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('appointments.indexUser') }}">Appointments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('discounts.all') }}">Promo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link whatsapp-button" onclick="sendMessage()">Whatsapp</a>
                </li>
                @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @endguest
              </ul>

            </div>
            <div class="quote_btn-container ">
              <a href="">
                <img src="{{ asset('images/cart.png') }}" alt="">
                <div class="cart_number">
                  0
                </div>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- Products Section -->
  <div class="container py-5 my-5">
    <div class="justify-content-center text-center">
        <h6 class="d-inline-block bg-light text-warning text-uppercase py-1 px-2">Payments</h6>
        <h1 class="mb-5">Pay for Appointment #{{ $appointment->id }}</h1>
        <button id="pay-button" class="btn btn-custom">Pay Now</button>
    </div>
    
    <form action="{{ url('payment/callback') }}" method="POST" id="submit_form">
        @csrf
        <input type="hidden" name="order_id" id="order_id">
        <input type="hidden" name="status_code" id="status_code">
        <input type="hidden" name="gross_amount" id="gross_amount">
        <input type="hidden" name="signature_key" id="signature_key">
    </form>
  </div>
  <!-- End Products Section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <a href="">
                <img src="{{ asset('images/logo.png') }}" alt="">
                <span>
                  TS Beauty Care
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="{{ asset('images/location.png') }}" alt="">
                <span>
                  Jl. Samarang, No. 76, Kec. <br>
                  Tarogong Kaler, Kab. Garut, <br>
                  Jawa Barat 44151
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="{{ asset('images/phone.png') }}" alt="">
                <span>
                +62 85222229947
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="{{ asset('images/mail.png') }}" alt="">
                <span>
                    tsbeautycare@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Follow Us
            </h5>
          </div>
          <div class="social_box">
            <a href="">
              <img src="{{ asset('images/fb.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('images/twitter.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('images/linkedin.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('images/insta.png') }}" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="">TS Beauty Care</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    sendResponseToForm(result);
                },
                onPending: function(result){
                    sendResponseToForm(result);
                },
                onError: function(result){
                    console.log(result);
                },
                onClose: function(){
                    console.log('customer closed the popup without finishing the payment');
                }
            });
        });

        function sendResponseToForm(result){
            document.getElementById('order_id').value = result.order_id;
            document.getElementById('status_code').value = result.status_code;
            document.getElementById('gross_amount').value = result.gross_amount;
            document.getElementById('signature_key').value = result.signature_key;
            document.getElementById('submit_form').submit();
            window.location.href = '{{ route("appointments.indexUser") }}';
        }
  </script>

  <script>
        function sendMessage() {
            var phoneNumber = "6285222229947";
            var message = "Halo, saya tertarik dengan layanan di TS Beauty Care.";
            var whatsappUrl = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);
            window.open(whatsappUrl, "_blank");
        }
  </script>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
  <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
  <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <!-- Template Javascript -->
  <script src="{{ asset('js/main2.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
