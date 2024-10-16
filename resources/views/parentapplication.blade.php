<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hiring form</title>
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
        <header id="header" class="header fixed-top mb-5">
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
        <div class="insertform mt-5">
        <div class="container">
        <div class="row "  >
        <div class="col-8 offset-2 shadow rounded-1 mt-4 rounded-4" style="background-color: #86B6F6">
        <form class="m-3 p-3 "  enctype="multipart/form-data" method="POST" action="{{ route('parent#insert') }}" >
            @csrf
        <header class="section-header" style="font-size: 300px;">
        <h2 align="center" class="mb-4">Teacher Hiring Form</h2>
        </header>
        <div class="row">
   <div class="col-6">
    <input type="hidden" name="guideId" value="{{ $guide->id }}">
        <label for="position" class="col-sm-6 form-label">Teacher Name</label>
        <input type="text" class="form-control mb-3 @error('teacherName') is-invalid @enderror" id="tname" name="teacherName" value="{{ old('teacherName', $guide->name) }}">
    </div>
    <div class="col-6">

        <label for="position" class="col-sm-6 form-label">Salary</label>
        <input type="number" class="form-control mb-3 @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary', $guide->salary) }}">

    </div>
</div>
<div class="row">
    <div class="col-6">
        <label for="position" class="col-sm-6 form-label">Grade</label>
        <input type="text" class="form-control mb-3 @error('position') is-invalid @enderror" id="text" name="position" value="{{ old('position', $guide->position) }}">

    </div>
    <div class="col-6">
        <label for="position" class="col-sm-6 form-label">Subject</label>
        <input type="text" class="form-control mb-3 @error('subject') is-invalid @enderror" id="text" name="subject" value="{{ old('subject', $guide->subject) }}">
    </div>
</div>
        <h2 align="center">Student's Information</h2>

        <label for="position" class="col-sm-6 form-label">Student Name</label>
        <input type="text" class="form-control mb-3 @error('studentName') is-invalid @enderror" id="sname" value="{{ old('studentName') }}" name="studentName">
        @error('studentName')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="position" class="col-sm-6 form-label">Current School</label>
        <input type="text" class="form-control mb-3 @error('schoolName') is-invalid @enderror" id="school" value="{{ old('schoolName') }}" name="schoolName">
        @error('schoolName')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <div class="row mb-3">

            <div class="col-4"><label>Gender</label></div>
        <div class="form-check col-4">
            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="Male" @if (old('gender') == 'Male') checked @endif>
            <label class="form-check-label" for="exampleRadios1">Male</label>
          </div>

          <div class="form-check col-4">
            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="Female" @if (old('gender') == 'Female') checked @endif>
            <label class="form-check-label" for="exampleRadios2">Female</label>
          </div>
        </div>
        @error('gender')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <label for="position" class="col-sm-6 form-label">Parent Name</label>
        <input type="text" class="form-control mb-3 @error('parentName') is-invalid @enderror" id="pname" name="parentName" value="{{ old('parentName') }}">
        @error('parentName')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <input type="number" class="form-control mb-3  @error('userPh') is-invalid @enderror"  name="userPh" value="{{ old('userPh') }}">
        @error('userPh')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <textarea name="address"  cols="30" rows="5" class="form-control mb-3 @error('address') is-invalid @enderror">
            {{old('address')}}
        </textarea>
        @error('address')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <label for="" class="form-label">Kpay Number - 09784287989 (Thura Aung) Or</label>
        <label for="" class="form-label">Wave Number - 09784287989 (Thura Aung)</label>
        <label for="" class="form-label mb-4">ဆရာငှားရန်(သင်တန်းကြေးရဲ့ 30 ရာခိုင်နှုန်း {{$guide->salary * 0.3}} ကျပ် ကို ကြိုသွင်းရန်လိုအပ်ပါသည်)- </label>
        <br>
        <div class="d-flex mb-3">
            <img src="{{ asset('img/ThuraKpay.jpg') }}" alt="" width="200px" class="me-4">
        <img src="{{ asset('img/ThuraWave.jpg') }}" alt="" width="200px">
        </div>


        <label for="" class="form-label mb-3">ငွေလွှဲ screenshot ထည့်ရန် </label>
        <input type="file" name="kpayss" class="form-control @error('kpayss')
        is-invalid
        @enderror">
        @error('kpayss')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <div class="d-flex justify-content-md-end mt-5 ">
            <button type="submit" class="btn btn-primary btn-lg" name="sendBtn">Submit</button>
        </div>



        </div>
        </div>
        </div>
        </div>
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
<footer id="footer" class="footer mt-4" >



<div class="footer-top" style="background-color:#86B6F6">


<div class="container">
  <div class="copyright" >
    &copy; Copyright <strong><span>Group 13</span></strong>. All Rights Reserved
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
