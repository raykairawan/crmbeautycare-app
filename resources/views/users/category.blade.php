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

  <title>Reservasi List</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <link href="{{ asset('css/style3.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
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

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid bg-jumbotron" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h3 class="text-white display-3 mb-4">{{ $category->name }}</h3>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="{{ route('users.dashboard') }}">Home</a></p>
                <i class="far fa-circle px-3"></i>
                <p class="m-0">{{ $category->description }}</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

  <!-- Service Start -->
  <div class="container-fluid px-0 py-5 my-5">
        <div class="row mx-0 justify-content-center text-center">
            <div class="col-lg-6">
                <h6 class="d-inline-block bg-light text-warning text-uppercase py-1 px-2">Appointments</h6>
                <h1 class="mb-5">Daftar Produk</h1>
            </div>
        </div>
        <div class="container py-5">
          <div class="row">
              @foreach($products as $product)
                  <div class="col-md-4 mb-4">
                      <div class="card h-100">
                          @if($product->image)
                              <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                          @else
                              <img class="card-img-top" src="{{ asset('img/product-placeholder.jpg') }}" alt="Product Image">
                          @endif
                          <div class="card-body">
                              <h5 class="card-title">{{ $product->name }}</h5>
                              <p class="card-text">{{ $product->description }}</p>
                              <p class="card-text">Harga: Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>

        <div class="row justify-content-center bg-appointment mx-0">
            <div class="col-lg-6 py-5">
                <div class="p-5 my-5" style="background: rgba(33, 30, 28, 0.7);">
                    <h1 class="text-white text-center mb-4">Buat Reservasi</h1>
                    <form action="{{ route('appointments.store', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" name="reservation_date" class="form-control bg-transparent p-4 datetimepicker-input" placeholder="Pilih Tanggal" data-target="#date" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <div class="time" id="time" data-target-input="nearest">
                                <select name="reservation_time" class="form-control bg-transparent p-4z" id="reservation_time" placeholder="Pilih Waktu" data-target="#time">
                                </select>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: #fff">Kategori</label>
                                <input type="text" class="form-control bg-transparent p-4" value="{{ $category->name }}" readonly>
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: #fff">Pilih Produk: </label><br>
                                @foreach($products as $product)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="product_ids[]" value="{{ $product->id }}" id="product_{{ $product->id }}">
                                        <label style="color: #fff" class="form-check-label" for="product_{{ $product->id }}">
                                            {{ $product->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button class="btn btn-warning btn-block" type="submit" style="height: 47px;">Reservasi</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


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


  <script>
        function sendMessage() {
            var phoneNumber = "6285222229947";
            var message = "Halo, saya tertarik dengan layanan di TS Beauty Care.";
            var whatsappUrl = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);
            window.open(whatsappUrl, "_blank");
        }
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const timeSelect = document.getElementById('reservation_time');
      const dateInput = document.getElementById('date');

      const generateTimeOptions = (reservedSlots = []) => {
          timeSelect.innerHTML = '';
          const startHour = 10;
          const endHour = 18;

          for (let hour = startHour; hour < endHour; hour++) {
              const time24 = `${hour.toString().padStart(2, '0')}:00`;
              const time12 = moment(time24, 'HH:mm').format('hh:mm A');
              const option = document.createElement('option');
              option.value = time12;
              option.textContent = time12;
              if (reservedSlots.includes(time12)) {
                  option.disabled = true;
              }
              timeSelect.appendChild(option);
          }
      };

      dateInput.addEventListener('change', function () {
          const date = dateInput.value;
          if (date) {
              fetch(`/api/reserved-slots?date=${date}`)
                  .then(response => response.json())
                  .then(data => {
                      generateTimeOptions(data);
                  })
                  .catch(error => {
                      console.error('Error fetching reserved slots:', error);
                  });
          } else {
              generateTimeOptions();
          }
      });

      // Initial call to generate time options
      generateTimeOptions();
  });
  
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
