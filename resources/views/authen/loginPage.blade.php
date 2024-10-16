@extends('authen.layoutAuth')

@section('formff')
<div class="card-body">

    <div class="pt-4 pb-2">
      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
      <p class="text-center small">Enter your username & password to login</p>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('loginAlert'))
<div class="row">
 <div class="alert alert-warning alert-dismissible fade show col-10 offset-1" role="alert" >
     <div>
         <p>{{ session('loginAlert') }}</p>
     </div>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

</div>
@endif
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
        @csrf
      <div class="col-12">
        <label for="yourEmail" class="form-label">Email</label>
        <div class="input-group has-validation">
          <input type="email" name="email" class="form-control" id="yourEmail" >
          <div class="invalid-feedback">Please enter your username.</div>
        </div>
      </div>

      <div class="col-12">
        <label for="yourPassword" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="yourPassword" >
        <div class="invalid-feedback">Please enter your password!</div>
      </div>


      <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Login</button>
      </div>
      <div class="col-12">
        <p class="small mb-0">Don't have account? <a href="{{ route('auth#registerPage') }}">Create an account</a></p>
      </div>
    </form>

  </div>
@endsection
