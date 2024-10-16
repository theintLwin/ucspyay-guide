@extends('../adminHome')

@section('myContent')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="row gy-4">

    <section id="counts" class="counts" style="margin-bottom:180px;">
        <div class="container" data-aos="fade-up">

          <div class="row offset-1">
              &nbsp;&nbsp;
              <div class="card text-primary mb-3" style="max-width: 14rem; background-color:#77C3EC; ">
                  {{-- <div class="card-header">Header</div> --}}
                  <div class="card-body" style="background-color: #77C3EC">
                    <h5 class="card-title text-center">Students</h5>
                    <div class="col-lg-3 offset-3">
                      <div class="count-box d-flex">
                        <i class="bi bi-emoji-smile fs-3" style="color: #0D6EFD;"></i>
                        <div class="ms-3 fs-3">
                          <span data-purecounter-start="0" data-purecounter-end="{{ count($student) }}"
                           data-purecounter-duration="1" class="purecounter text-primary">{{ count($student) }}</span>
                          {{-- <p>Happy Students</p> --}}
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
  &nbsp;&nbsp;
                <div class="card text-danger mb-3" style="max-width: 14rem; background-color:#89CFF0">
                  {{-- <div class="card-header">Header</div> --}}
                  <div class="card-body" style="background-color: #89CFF0">
                    <h5 class="card-title text-center">Hiring Teachers</h5>
                    <div class="col-lg-3 offset-3">
                      <div class="count-box d-flex">
                          <i class="fa-solid fa-user-group fs-3" style="color: #bb0852;"></i>
                          <div class="ms-3 fs-3">
                          <span data-purecounter-start="0" data-purecounter-end="" data-purecounter-duration="1" class="purecounter text-danger">{{ count($hiringTr) }}</span>
                          {{-- <p>Happy Students</p> --}}
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
                &nbsp;&nbsp;
                <div class="card text-success mb-3" style="max-width: 14rem; background-color: #9DD9F3; ">
                  {{-- <div class="card-header">Header</div> --}}
                  <div class="card-body" style="background-color: #9DD9F3;">
                    <h5 class="card-title text-center">Available Teachers</h5>
                    <div class="col-lg-3 offset-3">
                      <div class="count-box d-flex">
                          <i class="fa fa-users fs-3" style="color: #13ca16;"></i>
                          <div class="ms-3 fs-3">
                          <span data-purecounter-start="0" data-purecounter-end="" data-purecounter-duration="1" class="purecounter text-success">{{ count($freeTr) }}</span>
                          {{-- <p>Happy Students</p> --}}
                        </div>
                      </div>
                    </div>
                    </div>
                </div>





      </div>
@endsection
