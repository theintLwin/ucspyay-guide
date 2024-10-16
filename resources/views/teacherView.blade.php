<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Teacher</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class=" d-flex align-items-center text-decoration-none">
        <img src="{{ asset('img/logo2.jpg') }}" alt="" class="ml-5 w-25">
        <span class="fs-4 fw-bold">Part-time Job <br>
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
                  <hr class="dropdown-divider">
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

  <!-- ======= Hero Section ======= -->

<br><br><br>
  <main id="main">
    <!-- ======= About Section ======= -->


    <!-- ======= Values Section ======= -->
    <section id="value" class="values">

      <div class="container" data-aos="fade-up" class="mt-5">

        <header class="section-header">
          <h2></h2>
          <p>Available Teachers</p>
        </header>
            {{-- <li class="list-group-item">An item</li> --}}
            @foreach ($subjects as $subject)
                    <button class="btn btn-outline-primary me-3 text-black">
                        <a href="{{ route('viewSubjectTr',[$subject->courseName,$subject->subjectName]) }}" class="text-black">
                            {{ $subject->subjectName }}
                        </a>
                    </button>

            @endforeach


        @if (count($teachers)>0)
        <div class="row">
            @foreach ($teachers as $teacher )

             <div class="col-lg-3 mt-4 rounded-pill me-4">
                 <a href="{{ route('teacher#detail',[$teacher->id]) }}">
               <div class="card" style="width: 18rem;">
                   <img src="{{ asset('storage/'.$teacher->photo) }}" class="" alt="..." height="250px">

                   <div class="card-body">
                     <p class="card-text fs-3">
                       <ul class="list-group">
                           <li class="list-group-item"><b>{{ $teacher->position }}</b></li>
                           <li class="list-group-item">Name - {{ $teacher->name }}</li>
                           <li class="list-group-item">Subject - {{ $teacher->subject }}</li>
                           <li class="list-group-item">Academic Year -  {{$teacher->academicYear}}</li>

                       </ul>
                     </p>
                   </div>
                 </div>
                 </a>
           </div>

            @endforeach
            {{-- {{ $teachers->appends()->links() }} --}}
         </div>
         <div>
        </div>
         @else
         <section class="section error-404 d-flex flex-column align-items-center justify-content-center" style="margin-top:-60px;">
             <h2>The Teachers for this position are  currently unavailable.</h2>
             <a class="btn btn-primary" href="{{ url('/#course') }}">Back to home</a>
             <img src="{{ asset('img/404photo.png') }}" class="img-fluid" >
             <div class="credits">
               <!-- All the links in the footer should remain intact. -->
               <!-- You can delete the links only if you purchased the pro version. -->
               <!-- Licensing information: https://bootstrapmade.com/license/ -->
               <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

             </div>
           </section>
        @endif
        <div class="row">
            <div class="col text-center fs-2">
                <a href="{{ url('/#course') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                Back
                </a>
            </div>
        </div>





    </section><!-- End Values Section -->







    <!-- ======= Services Section ======= -->
   <!-- End Services Section -->

 <section>
    <div class="container" data-aos="fade-up">

    </div>
 </section>
    <!-- ======= Contact Section ======= -->
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">



    <div class="footer-top">


    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Group 13</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Developed by Group13
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
