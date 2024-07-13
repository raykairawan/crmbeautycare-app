<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
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

   <!-- Appointment Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center text-center">
                <div class="col-lg-6">
                    <h6 class="d-inline-block bg-light text-warning text-uppercase py-1 px-2">Appointments</h6>
                    <h1 class="mb-5">Reservasi Data</h1>
                </div>
            </div>
            <div class="row justify-content-center bg-appointment mx-0">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>No Telp</th>
                                <th>Reservation Date</th>
                                <th>Reservation Time</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->name }}</td>
                                    <td>{{ $appointment->no_tlp }}</td>
                                    <td>{{ $appointment->reservation_date }}</td>
                                    <td>{{ $appointment->reservation_time }}</td>
                                    <td>{{ $appointment->category->name }}</td>
                                    <td>{{ $appointment->status ? 'Sudah Dibayar' : 'Belum Bayar' }}</td>
                                    <td>
                                    @if($appointment->status)
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-warning ml-2" data-appointment-id="{{ $appointment->id }}" onclick="openFeedbackModal({{ $appointment->id }})">Feedback</button>
                                            <div>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $appointment->rating)
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    @else
                                                        <i class="bi bi-star text-warning"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('pay', $appointment->id) }}" class="btn btn-warning">Bayar</a>
                                    @endif
                                </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
    
    <!-- Feedback section -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="feedbackModalLabel">Feedback</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="feedbackForm">
                      @csrf
                      <div class="form-group">
                          <label for="rating">Rating</label>
                          <select id="rating" name="rating" class="form-control" required>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="comment">Comment</label>
                          <textarea id="comment" name="comment" class="form-control" maxlength="1000"></textarea>
                      </div>
                      <input type="hidden" id="appointment_id" name="appointment_id">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
          </div>
      </div>
    </div>
    <!-- Feedback End -->

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
    function openFeedbackModal(appointmentId) {
        document.getElementById('appointment_id').value = appointmentId;
        $('#feedbackModal').modal('show');
    }

    document.getElementById('feedbackForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch('{{ route("feedback.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Thank you for your feedback!');
                $('#feedbackModal').modal('hide');
                let feedbackButton = document.querySelector(`button[data-appointment-id="${formData.get('appointment_id')}"]`);
                if (feedbackButton) {
                    feedbackButton.outerHTML = '<button class="btn btn-warning">✔️</button>';
                }
            } else {
                alert('There was an error submitting your feedback.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
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
