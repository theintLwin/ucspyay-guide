<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style1.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- Search Box --}}
    {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->




        <li class="nav-item dropdown pe-3 me-5">

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
                        <img src="{{ asset('img/profile.png') }}" alt="">
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
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin#profile') }}">
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

    </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('admin/home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ url('admin/courses') }}">
            <i class="fa-solid fa-book"></i>
          <span>Courses</span>
        </a>
      </li><!-- End Course -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-user-pen"></i><span>Teacher Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin#viewCurrentTeacher') }}">
              <i class="bi bi-circle"></i><span>Current Teachers</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin#viewWaitingTeacher') }}">
              <i class="bi bi-circle"></i><span>Teachers in Waiting Lists</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin#addTeacherForm') }}">
              <i class="bi bi-circle"></i><span>Insert Form</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-users"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/viewHiringRequests') }}">
              <i class="bi bi-circle"></i><span>View hiring requests</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ url('admin/vacancyView') }}">
            <i class="bi bi-journal-text"></i>
          <span>Vacancy Form</span>
        </a>
      </li><!-- End Vacancy -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-paper-plane"></i><span> Reviews </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/showAdminReview') }}">
              <i class="bi bi-circle"></i><span> View Admin Review</span>
            </a>
          </li>

          <li>
            <a href="{{ url('admin/showReview') }}">
              <i class="bi bi-circle"></i><span> View Teachers Review</span>
            </a>
          </li>


        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{ url('admin/teacher/register') }}">
            <i class="fa-solid fa-file-pen"></i>          <span> Teacher Register </span>
        </a>
      </li><!-- End  -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

   @yield('myContent')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      {{-- &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved --}}
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Developed by <a href="#">Group 13</a>
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
  <script src="{{ asset('js/main1.js') }}"></script>

</body>

</html>
