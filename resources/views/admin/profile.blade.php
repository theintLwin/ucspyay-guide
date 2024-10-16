@extends('adminHome')

@section('myContent')
    <div class="container">
        <div class="row offset-2">
            <div class="card mb-3 mt-5" style="max-width: 540px;">
                <div class="row m-4 text-center">
                    <h5 class="card-title">Account Info</h5>
                </div>
                <div class="row g-0">
                  <div class="col-md-4">
                    @if (Auth::user()->profile_photo_path)
                    <img src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" class="img-fluid rounded-start" alt="...">

                    @else
                    <img src="{{ asset('img/profile.png') }}" class="img-fluid rounded-start" alt="...">
                    @endif

                    <a href="{{ route('profile#edit', [Auth::user()->id]) }}">
                        <button type="button"  class="btn btn-primary mt-4 m-3 ">Update Profile</button>

                    </a>
                  </div>
                  <div class="col-md-7 offset-2 ms-3">
                    <div class="card-body">

                      <p class="card-text"><i class="fa fa-user-pen"></i></i> Name - {{ Auth::user()->name }}</p>
                      <p class="card-text"> <i class="fa-solid fa-envelope"></i> Email - {{ Auth::user()->email }}</p>

                      <p class="card-text"> <i class="fa-solid fa-calendar-days"></i> Joined Date - {{ Auth::user()->created_at->format('d/m/y') }}</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
