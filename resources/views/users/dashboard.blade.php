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

  <title>TS Beauty Care</title>

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

<body>

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
                  <a class="nav-link" href="{{ route('users.dashboard') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('categories.all') }}"> Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('products.all') }}">Products </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Appointments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Promo</a>
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
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="design-box">
        <img src="{{ asset('images/design-1.png') }}" alt="">
      </div>
      <div class="slider_number-container d-none d-md-block">
        <div class="number-box">
          <span>
            01
          </span>
          <hr>
          <span class="jwel">
            T <br>
            S <br>
            B <br>
            e <br>
            a <br>
            u <br>
            t <br>
            y <br>
            C <br>
            a <br>
            r <br>
            e 
          </span>
          <hr>
          <span>
            02
          </span>
        </div>
      </div>
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="0">02</li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2>
                      <span> Selamat Datang di</span>
                      <hr>
                    </h2>
                    <h1>
                      TS Beauty Care
                    </h1>
                    <p>
                     Klinik kecantikan terbaik di Garut. Rasakan pengalaman kecantikan eksklusif
                     dengan layanan terdepan kami. Dapatkan solusi kecantikan yang sesuai dengan jenis
                     kulitmu, untuk raih #CantikSesuaiKulitmu
                    </p>
                    <div>
                      <a href="">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img style="width: 65%;  margin-left: 180px; margin-bottom: 40px;" src="{{ asset('images/ts2.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2>
                      <span> Selamat Datang di</span>
                      <hr>
                    </h2>
                    <h1>
                      TS Beauty Care
                    </h1>
                    <p>
                     Klinik kecantikan terbaik di Garut. Rasakan pengalaman kecantikan eksklusif
                     dengan layanan terdepan kami. Dapatkan solusi kecantikan yang sesuai dengan jenis
                     kulitmu, untuk raih #CantikSesuaiKulitmu
                    </p>
                    <div>
                      <a href="">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img style="width: 65%;  margin-left: 180px; margin-bottom: 40px;" src="{{ asset('images/ts3.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- client section -->

  <section class="client_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimonial
        </h2>
      </div>
      <h4 class="secondary_heading">
        Apa kata mereka?
      </h4>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container">
              <div class="client-id">
                <div class="img-box">
                  <img src="{{ asset('asset/Galeri/image (23).png') }}" alt="">
                </div>
                <div class="name">
                  <h5>
                    Putri Handayani
                  </h5>
                  <h6>
                    Mahasiswi
                  </h6>
                </div>
              </div>
              <div class="detail-box">
                <p>
                "Saya sangat senang dengan perawatan di TS Beauty Care! 
                Kulit saya menjadi lebih bersih dan cerah setelah mengikuti 
                rangkaian perawatan wajah. Stafnya ramah dan profesional, 
                selalu memberikan saran yang tepat untuk jenis kulit saya. 
                Tempatnya juga sangat nyaman dan bersih. Saya pasti akan 
                kembali lagi!"
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container">
              <div class="client-id">
                <div class="img-box">
                  <img src="{{ asset('asset/Galeri/image (17).png') }}" alt="">
                </div>
                <div class="name">
                  <h5>
                    Aliya Jasmine
                  </h5>
                  <h6>
                    Wirawasta
                  </h6>
                </div>
              </div>
              <div class="detail-box">
                <p>
                "TS Beauty Care benar-benar klinik kecantikan yang luar
                 biasa. Saya melakukan perawatan anti-aging di sini dan 
                 hasilnya sangat memuaskan. Wajah saya terlihat lebih muda 
                 dan segar. Teknologi yang digunakan sangat modern dan aman. 
                 Saya merasa sangat dihargai sebagai pelanggan karena
                  pelayanan yang diberikan sangat personal dan menyeluruh."
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container">
              <div class="client-id">
                <div class="img-box">
                  <img src="{{ asset('asset/Galeri/image (13).png') }}" alt="">
                </div>
                <div class="name">
                  <h5>
                    Della Siti Nurhanasah
                  </h5>
                  <h6>
                    Pekerja Lapas
                  </h6>
                </div>
              </div>
              <div class="detail-box">
                <p>
                "Saya memiliki masalah jerawat yang parah dan mencoba berbagai 
                klinik kecantikan tanpa hasil yang memuaskan, sampai saya 
                menemukan TS Beauty Care. Dalam beberapa bulan, jerawat saya 
                berkurang drastis dan kulit saya menjadi lebih halus. Saya 
                sangat merekomendasikan klinik ini kepada siapa saja yang 
                ingin mendapatkan perawatan kulit berkualitas tinggi."
                </p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
  </section>

  <!-- end client section -->


  <!-- ring section -->

  <section class="ring_section layout_padding">
    <div class="design-box">
      <img src="{{ asset('images/design-1.png') }}" alt="">
    </div>
    <div class="container">
      <div class="ring_container layout_padding2">
        <div class="row">
          <div class="col-md-5">
            <div class="detail-box">
              <h4>
                TsBeautyCare
              </h4> <br>
              <p>
                Jl. Samarang, No. 76, Kec. <br>
                Tarogong Kaler, Kab. Garut, <br>
                 Jawa Barat 44151
              </p>
              <br><br>
              <hr>
              <h2>
                Jam Operasional
              </h2> <br>
              <p style="display: flex; flex-direction: column; align-items: center; width: 200px; margin: 0 auto;">
                  <span style="display: flex; justify-content: space-between; width: 100%;">
                      <span>Senin</span><span>10:00 - 18:00 WIB</span>
                  </span>
                  <span style="display: flex; justify-content: space-between; width: 100%;">
                      <span>Selasa</span><span>10:00 - 18:00 WIB</span>
                  </span>
                  <span style="display: flex; justify-content: space-between; width: 100%;">
                      <span>Rabu</span><span>10:00 - 18:00 WIB</span>
                  </span>
                  <span style="display: flex; justify-content: space-between; width: 100%;">
                      <span>Kamis</span><span>10:00 - 18:00 WIB</span>
                  </span>
                  <span style="display: flex; justify-content: space-between; width: 100%;">
                      <span>Jum'at</span><span>10:00 - 18:00 WIB</span>
                  </span>
                  <span style="display: flex; justify-content: space-between; width: 100%;">
                      <span>Sabtu</span><span>10:00 - 18:00 WIB</span>
                  </span>
                  <span style="display: flex; justify-content: space-between; width: 100%;">
                      <span>Minggu</span><span>10:00 - 18:00 WIB</span>
                  </span>
              </p>




              
            </div>
          </div>
          <div class="col-md-7">
            <div class="img-box">
              <img style="width: 50%" src="{{ asset('asset/Galeri/image-2.jpg') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end ring section -->
   
  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="design-box">
      <img src="{{ asset('images/design-2.png') }}" alt="">
    </div>
    <div class="container ">
      <div class="">
        <h2 class="">
          Contact Us
        </h2>
      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="">
            <div>
              <input type="text" placeholder="Name" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button> 

            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.263363203273!2d107.8566795737955!3d-7.210767870791855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b07f6f163333%3A0xa1918acf6bb243b8!2sJl.%20Raya%20Samarang%20No.76%2C%20Cintarakyat%2C%20Kec.%20Samarang%2C%20Kabupaten%20Garut%2C%20Jawa%20Barat%2044151!5e0!3m2!1sid!2sid!4v1720318478307!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

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
      <a href="https://html.design/">TS Beauty Care</a>
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

  <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>

</html>