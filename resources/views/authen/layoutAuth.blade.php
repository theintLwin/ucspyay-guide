<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <header id="header" class="header fixed-top ">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between bg-white py-3">

          <a href="index.html" class=" d-flex align-items-center">
            <img src="{{ asset('img/logo2.jpg') }}" alt="" class="ml-5 w-25">
            <span class="fs-4 fw-bold text-dark" >Part-time Job <br>
                                        For UCSPyay Students</span>
          </a>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
              <li><a class="nav-link scrollto color_code" href="{{ url('/#about') }}">About</a></li>
              <li><a class="nav-link scrollto" href="{{ url('/#course') }}">Course</a></li>
              <li><a class="nav-link scrollto" href="{{ url('/#vacancy') }}">Guide Vacancy</a></li>
              <li><a class="nav-link scrollto" href="{{ url('/#reviews') }}">Reviews</a></li>
              <li><a class="nav-link scrollto" href="{{ url('/#contact') }}">Contact</a></li>


            @if (Auth::check())
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">

                    <div class="d-flex">
                        <div>
                            @if (Auth::user()->profile_photo_path != null)
                            <img src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" alt="" class="rounded-circle" style="width:50px;">
                            @else
                            <img src="{{ asset('img/profile.png') }}" alt="" style="width:50px;">
                            @endif
                        </div>
                        <div>
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </div>


                    </div>

                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('user/profile') }}">
                      <i class="bi bi-person"></i>
                      <span>My Profile</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('change#Pw') }}">
                      <i class="bi bi-gear"></i>
                      <span>Change Password</span>
                    </a>
                  </li>

                  <li>
                      <form action="{{route('logout')}}" method="POST">
                          @csrf
                    <div class="dropdown-item d-flex align-items-center" >
                      <button type="submit" class="w-100" >
                          <i class="bi bi-box-arrow-right"></i>
                          <span>Sign Out</span>
                      </button>
                    </div>
                  </form>
                  </li>

                </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->
              @else
              <li><a class="getstarted scrollto" href="{{ route('auth#loginPage') }}">Login</a></li>
            @endif









            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">

              </div><!-- End Logo -->

              {{-- <div class="card mb-3"> --}}

                @yield('formff')
              {{-- </div> --}}

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <footer id="footer" class="footer" >



    <div class="footer-top" style="background-color:#92C7CF">


    <div class="container">
      <div class="copyright" >
         <strong><span>Group 13</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        Developed by Group13
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
