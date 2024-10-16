<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{ asset('img/favicon.png') }}" rel="icon">

  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        #line1 span#a {
            display: inline;
            font-size: 20px;
        }

        #line1:hover span#a {
            display: none;
        }

        #line1 span#b {
            display: none;
            font-size: 25px;
            color:#0D6EFD;
            margin-left:5px;
        }

        #line1:hover span#b {
            display: inline;
        }
    </style>

</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top ">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between bg-white py-3">

            <a href="{{ url('/') }}" class=" d-flex align-items-center text-decoration-none">
                <img src="{{ asset('img/logo2.jpg') }}" alt="" class="ml-5 w-25">
                <span class="fs-4 fw-bold text-dark">Part-time Job <br>
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
                        <li class="nav-item dropdown">

                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                                data-bs-toggle="dropdown">
                                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                            </a><!-- End Profile Iamge Icon -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">

                                    <div class="d-flex">
                                        <div>
                                            @if (Auth::user()->profile_photo_path != null)
                                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                                    alt="" class="rounded-circle" style="width:50px;">
                                            @else
                                                <img src="{{ asset('img/profile.png') }}" alt=""
                                                    style="width:50px;">
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
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ url('user/profile') }}">
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
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <div class="dropdown-item d-flex align-items-center">
                                            <button type="submit" class="w-100">
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
    <section id="hero home" class="hero d-flex align-items-center">

        <div class="w3-content w3-section" id="home" style="max-width:500px; margin-left:50px; margin-top:100px;" >

            <img class="mySlide" src="{{ asset('img/carousel1.jpg') }}" style="width:1130px; height:600px;">
            <img class="mySlide" src="{{ asset('img/carousel2.jpg') }}" style="width:1130px; height:600px;">
            <img class="mySlide" src="{{ asset('img/carousel3.jpg') }}" style="width:1130px; height:600px;">
            {{-- <img class="mySlide" src="{{ asset('img/learnner.jpeg') }}" style="width:1130px; height:600px;">
            <img class="mySlide" src="{{ asset('img/learn.jpeg') }}" style="width:1130px; height:600px;">
        </div> --}}

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-10 offset-1 " data-aos="fade-up" data-aos-delay="200">
                        <div class="content rounded-4 shadow " style="background-color:#78e0f0;">

                            <h2 class="text-center mb-4">ရည်ရွယ်ချက်</h2>
                            <ul class="list-group fs-5 text-muted" style="color:#DCF2F1;text-align:justify;"
                                id="line1">
                                <li class="list-group-item p-3"> <span id="a">ကွန်ပျူတာတက္ကသိုလ်(ပြည်)
                                        ကျောင်းသူ၊ကျောင်းသားများအတွက် အချိန်ပိုင်းအလုပ်အကိုင် အခွင့်အလမ်းများ
                                        ရရှိရန်ဖြစ်ပါသည။</span>
                                    <span id="b">ကွန်ပျူတာတက္ကသိုလ်(ပြည်) ကျောင်းသူ၊ကျောင်းသားများအတွက်
                                        အချိန်ပိုင်းအလုပ်အကိုင် အခွင့်အလမ်းများ ရရှိရန်ဖြစ်ပါတယ်။</span>
                                </li>
                                <li class="list-group-item p-3"><span id="a">ကျောင်းသားမိဘများအနေဖြင့်လည်း
                                        အရည်အချင်းပြည့်မှီသော ဆရာ၊ဆရာမများကို တစ်နေရာတည်းတွင် လွယ်ကူစွာ
                                        ရှာဖွေတွေ့နိုင်မှာဖြစ်ပါတယ်။</span><span id="b">ကျောင်းသားမိဘများအနေဖြင့်လည်း
                                          အရည်အချင်းပြည့်မှီသော ဆရာ၊ဆရာမများကို တစ်နေရာတည်းတွင် လွယ်ကူစွာ
                                          ရှာဖွေတွေ့နိုင်မှာဖြစ်ပါတယ်။</span></li>
                                <li class="list-group-item p-3"><span id="a">လုပ်ငန်းအတွက်လိုအပ်သော ကွန်ပျူတာဆိုင်ရာ
                                  ဘာသာရပ်များ၊ဘာသာစကားနှင့် Programming Language စသည်တို့ကို သင်ကြားပေးနိုင်သော
                                  ဆရာ၊ဆရာမများကို အလွယ်တကူ ရှာဖွေနိုင်မှာဖြစ်ပါတယ်။</span>
                                  <span id="b">လုပ်ငန်းအတွက်လိုအပ်သော ကွန်ပျူတာဆိုင်ရာ
                                    ဘာသာရပ်များ၊ဘာသာစကားနှင့် Programming Language စသည်တို့ကို သင်ကြားပေးနိုင်သော
                                    ဆရာ၊ဆရာမများကို အလွယ်တကူ ရှာဖွေနိုင်မှာဖြစ်ပါတယ်။</span></li>
                            </ul>

                        </div>
                    </div>



                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <section id="course" class="values">

            <div class="container" data-aos="fade-up" id="course">

                <header class="section-header">
                    <h2></h2>
                    <p>သင်ကြားပေးနိုင်သောဘာသာရပ်များ</p>
                </header>

                <div class="row">

                    @foreach ($courses as $course)
                        <div class="col-lg-3 mt-4 rounded-5" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('teacher#view', [$course->CourseName]) }}">
                                <div class="box rounded-5" style="background-color: #7FC7D9;">
                                    <img src="{{ asset('storage/' . $course->Photo) }}" alt=""
                                        style="width:200px;height:250px;">
                                    <h3 class="text-white">{{ $course->CourseName }}</h3>

                                </div>
                            </a>
                        </div>
                    @endforeach





                </div>

        </section><!-- End Values Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row offset-1">
                    &nbsp;&nbsp;
                    <div class="card text-primary bg-light border-primary mb-3" style="max-width: 18rem;">
                        {{-- <div class="card-header">Header</div> --}}
                        <div class="card-body">
                            <h5 class="card-title text-center">Students</h5>
                            <div class="col-lg-3">
                                <div class="count-box">
                                    <i class="bi bi-emoji-smile" style="color: #0D6EFD;"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="{{ count($student) }}"
                                            data-purecounter-duration="1" class="purecounter text-primary"></span>
                                        {{-- <p>Happy Students</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    &nbsp;&nbsp;
                    <div class="card text-danger bg-light mb-3 border-danger" style="max-width: 18rem;">
                        {{-- <div class="card-header">Header</div> --}}
                        <div class="card-body">
                            <h5 class="card-title text-center">Hiring Teachers</h5>
                            <div class="col-lg-3 offset-2">
                                <div class="count-box">
                                    <i class="fa-solid fa-user-group" style="color: #bb0852;"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="{{ count($hiringTr) }}"
                                            data-purecounter-duration="1" class="purecounter text-danger"></span>
                                        {{-- <p>Happy Students</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    &nbsp;&nbsp;
                    <div class="card text-success bg-light mb-3 border-success" style="max-width: 18rem;">
                        {{-- <div class="card-header">Header</div> --}}
                        <div class="card-body">
                            <h5 class="card-title text-center">Available Teachers</h5>
                            <div class="col-lg-3 offset-2">
                                <div class="count-box">
                                    <i class="fa fa-users" style="color: #13ca16;"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="{{ count($freeTr) }}"
                                            data-purecounter-duration="1" class="purecounter text-success"></span>
                                        {{-- <p>Happy Students</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-3 offset-2">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Students</p>
              </div>
            </div>
          </div>
 --}}



                    {{-- <div class="col-lg-3 ">
            <div class="count-box">
              <i class="fa-solid fa-user-group" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hardwork Teachers</p>
              </div>
            </div>
          </div> --}}

                    {{-- <div class="col-lg-3 ">
            <div class="count-box">
                <i class="fa fa-users" style="color: #13ca16;"></i>
                <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Available Teachers</p>
              </div>
            </div>
          </div> --}}
                </div>

            </div>
        </section><!-- End Counts Section -->





        <!-- ======= Services Section ======= -->
        <section id="vacancy" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2></h2>
                    <p>Guide Vacancy</p>
                </header>

                <div class="row gy-4">

                    @foreach ($datas as $data)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-box blue" class="border:3px solid black;">
                                <i class="fa-solid fa-user-pen icon "></i>
                                <div class="text-start fs-6 fw-bold">
                                    <p class="">သင်ကြားမည့်ဘာသာရပ် - {{ $data['subjectName'] }}</p>
                                    <p>သင်ကြားမည့်အတန်း-{{ $data['courseName'] }}</p>
                                    <p>လစာ(1 လစာ)-{{ $data['salary'] }} Kyats</p>

                                    <p>မှတ်ချက် - {{ $data['description'] }}</p>
                                    <a href="{{ route('vacancyForm', [$data->id]) }}"
                                        class="read-more ml-5"><span>အလုပ်လျှောက်ရန်</span> <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach






                </div>

            </div>

        </section><!-- End Services Section -->

        <section>
            <div class="container" data-aos="fade-up" id="reviews">
                @if (session('reviewCorrect'))
                    <div class="row">
                        <div class="alert alert-success alert-dismissible fade show col-8 offset-2" role="alert">
                            <div>
                                <p>{{ session('reviewCorrect') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>

                    </div>
                @endif
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <header class="section-header">
                            <h2>You can review here.</h2>
                            <p>Any Recommendation?</p>
                        </header>
                        <form action="{{ url('review/go') }}" method="post">
                            @csrf
                            <div class="row gy-4">
                                <input type="hidden" name="receiver" value="admin">
                                <div class="col-md-3 offset-3">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid  @enderror"
                                        placeholder="Your Name">
                                    @error('name')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 ">
                                    <input type="email" class="form-control @error('email') is-invalid  @enderror"
                                        name="email" placeholder="Your Email">
                                    @error('email')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="col-md-6 offset-3">
                                    <textarea class="form-control @error('message') is-invalid  @enderror" name="message" rows="6"
                                        placeholder="Message"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    {{-- <button type="submit" class="btn btn-outline-primary">Send Message</button> --}}
                                    <input type="submit" value="Send Message" class="btn btn-outline-primary">
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">


                <header class="section-header">
                    <h2>Contact</h2>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6 offset-3">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box text-center">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>University of <br>Computer Studies, Pyay</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box text-center">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>+959 784287989<br>+959 254935630</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box text-center">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>admin321@gmail.com
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box text-center">
                                    <i class="bi bi-clock"></i>
                                    <h3>Open Hours</h3>
                                    <p>Every day<br>9:00AM - 05:00PM</p>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>

            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">



        <div class="footer-top" style="background-color:#92C7CF">


            <div class="container">
                <div class="copyright">

                </div>
                <div class="credits">

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

    <script>
        var myId=0;
        carousel();
        function carousel(){
            var i;
            var x=document.getElementsByClassName("mySlide");
            for(i=0;i<x.length;i++){
                x[i].style.display="none";
            }
            myId++;
            if(myId>x.length){
                myId=1;
            }
            x[myId-1].style.display="block";
            setTimeout(carousel,2000);
        }
    </script>

</body>

</html>
