@extends('authen.layoutAuth')

@section('formff')
<div class="card-body">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="pt-4 pb-2">
      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
      <p class="text-center small ">Enter your personal details to create account</p>
    </div>

    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="role" value="user">
      <div class="col-12">
        <label for="yourName" class="form-label">Your Name</label>
        <input type="text" name="name" class="form-control " id="yourName" >
        <div class="invalid-feedback">Please, enter your name!</div>
      </div>

      <div class="col-12">
        <label for="yourEmail" class="form-label">Your Email</label>
        <input type="email" name="email" class="form-control" id="yourEmail" >
        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
      </div>



      <div class="col-12">
        <label for="yourPassword" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="yourPassword" >
        <div class="invalid-feedback">Please enter your password!</div>
      </div>

      <div class="mt-4">
        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
        <input type="password" name="password_confirmation" class="form-control" id="yourPassword" >
        <div class="invalid-feedback">Please enter your password!</div>

    </div>

      {{-- <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
          <div class="invalid-feedback">You must agree before submitting.</div>
        </div> --}}
      </div>
      <div class="col-12 mt-4 mb-3">
        <button class="btn btn-primary w-100" type="submit">Create Account</button>
      </div>
      <div class="col-12">
        <p class="small mb-0">Already have an account? <a href="{{ route('auth#loginPage') }}">Log in</a></p>
      </div>
    </form>

  </div>
@endsection
