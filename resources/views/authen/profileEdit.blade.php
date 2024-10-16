@extends('adminHome')

@section('myContent')
<div class="card-body">

    <div class="pt-4 pb-2">
      <h5 class="card-title text-center pb-0 fs-4">Update Your Account</h5>
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
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('profile#update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="uid" value="{{ $user->id }}">
        <input type="hidden" name="user_role" value="{{ $user->role }}">
        @if ($user->profile_photo_path != null)
            <img src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="" style="width:10%;">
            @else
            <img src="{{ asset('img/profile.png') }}" alt="" style="width:10%;">

        @endif
        <input type="file" name="pf_photo" id="">

        <div class="col-12">
            <label for="yourName" class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control " id="yourName" value="{{ $user->name }}">
            <div class="invalid-feedback">Please, enter your name!</div>
          </div>
      <div class="col-12">
        <label for="yourEmail" class="form-label">Email</label>
        <div class="input-group has-validation">
          <input type="email" name="email" class="form-control" id="yourEmail" value="{{ $user->email }}" >
          <div class="invalid-feedback">Please enter your username.</div>
        </div>
      </div>




      <div class="col-12 text-center">
        <button class="btn btn-primary w-25" type="submit">Update</button>
      </div>

    </form>

  </div>
@endsection
