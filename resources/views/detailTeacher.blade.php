<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Detail Teacher</title>


    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">

    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .row {
            margin-left: 50px;
        }

        .leaf {
            width: 100px;
            height: 100px;
            border-radius: 0 60px;
            transform: rotate(0deg);
            margin-left: 40px;
            margin-top: 100px;
            width: 200px;
            height: 170px;
        }

        .card-body {
            margin-left: 30px;
            ;
        }
    </style>
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
          <li><a class="getstarted scrollto text-decoration-none" href="{{ route('auth#loginPage') }}">Login</a></li>
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

            <div class="container" data-aos="fade-up" class="mt-4">

                <header class="section-header">
                    <h2></h2>
                    <p>Detail Teacher View</p>
                </header>
                @if (session('hireSuccess'))
                    <div class="row">
                        <div class="alert alert-success alert-dismissible fade show col-8 offset-2 mt-4" role="alert"
                            style="height: 100px">
                            <div>
                                <p>{{ session('hireSuccess') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>

                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12 mt-4 rounded-pill ">
                        <div class="card mb-3" style="max-width: 1200px">

                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" class="img-fluid ms-0"
                                        alt="...">
                                </div>

                                <div class="col-md-6 offset-1">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $teacher->position }}</h5>
                                        <p class="card-text">Name - {{ $teacher->name }}</p>
                                        <p class="card-text">Subject - {{ $teacher->subject }}</p>
                                        <p>Academic Year - {{ $teacher->academicYear }}</p>
                                        <p>Experience - {{ $teacher->experience }}</p>
                                        <p>Salary - {{ $teacher->salary }} kyats per month</p>
                                        <h6>Available Time</h6>
                                        <ul>
                                            <li>{{ $teacher->section1 }}</li>
                                            <li>{{ $teacher->section2 }}</li>
                                            @if ($teacher->section3 !=null)
                                            <li>{{ $teacher->section3 }}</li>

                                        @endif
                                        @if ($teacher->section4 !=null)
                                            <li>{{ $teacher->section4 }}</li>

                                        @endif
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('giveReview', [$teacher->name]) }}" class="text-decoration-none me-3">
                                            <button class="btn btn-outline-primary">Review</button>

                                        </a>
                                        @if ($teacher->hiring_status == 1)
                                            <button class="btn btn-dark" disabled>Being Hired</button>
                                        @else
                                            <a href="{{ route('teacher#hire', [$teacher->id]) }}">
                                                <button class="btn btn-success">Hire</button>
                                            </a>
                                        @endif
                                        <div class="card mt-5 p-3">
                                            <h4>Reviews</h4>

                                            @foreach ($reviews as $review)
                                                <div class="comment mb-3">
                                                    <div class="comment_header d-flex">
                                                        <div class="comment_header-pic">
                                                           @if ($review->photo == null)
                                                           <img src="{{ asset('img/profile.png') }}" alt=""
                                                           width="50px" class="rounded-circle">
                                                           @else
                                                           <img src="{{ asset('storage/'.$review->photo) }}" alt=""
                                                           width="50px" class="rounded-circle">
                                                           @endif
                                                        </div>
                                                        <div class="ms-3">
                                                            <p class="fw-bold">{{ $review->name }}</p>
                                                            <h6 class="fw-bold">{{ $review->email }}</h6>
                                                            <div class="comment_content">
                                                                <p>
                                                                    {{ $review->message }}
                                                                </p>
                                                            </div>
                                                            <span>{{ $review->created_at->format('d-m-Y') }}</span>
                                                        </div>
                                                    </div>


                                                </div>
                                            @endforeach
                                            @if (Auth::check())
                                            <div class="row">
                                                <div class="col">
                                                <form action="{{ url('review/write') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="receiver" value="{{ $teacher->name }}">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="write something..."
                                                            aria-describedby="basic-addon2" name="message" required>
                                                        <span class="input-group-text" id="basic-addon2">
                                                            <button type="submit"
                                                                class="btn btn-primary">Review</button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                            @endif




                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center fs-2">
                                <a href="{{ route('viewSubjectTr',[$teacher->position,$teacher->subject]) }}">
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
    <footer id="footer" class="footer" >



        <div class="footer-top" style="background-color:#86B6F6">


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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>
