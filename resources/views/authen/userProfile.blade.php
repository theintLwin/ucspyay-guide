@extends('UserHome')

@section('myContent')
    <div class="container">
        <div class="row text-center mb-5">
            <h5 class="card-title">Account Info</h5>
        </div>
        <div class="row">
            <div class="col-md-4">
                @if (Auth::user()->profile_photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="img-fluid rounded-start"
                        alt="..." width="100px">
                @else
                    <img src="{{ asset('img/profile.png') }}" class="img-fluid rounded-start" alt="...">
                @endif
                <a href="{{ route('profile#edit', [Auth::user()->id]) }}">
                    <button type="button" class="btn btn-primary mt-4 m-3 ">Upload Profile</button>
                </a>
                <p class="card-text"><i class="fa fa-user-pen me-1"></i></i> Name - {{ Auth::user()->name }}</p>
                <p class="card-text"> <i class="fa-solid fa-envelope me-1"></i> Email - {{ Auth::user()->email }}</p>

                <p class="card-text"> <i class="fa-solid fa-calendar-days me-1"></i> Joined Date -
                    {{ Auth::user()->created_at->format('d/m/y') }}</p>
                    <hr>
            </div>
            <div class="col-md-4">

                @if (Auth::user()->role == 'teacher')
                    @foreach ($teachers as $teacher)
                    <p class="card-text"> <i class="fa-solid fa-layer-group"></i> Phone Number -
                        {{ $teacher->phno }}</p>
                        <p class="card-text"> <i class="fa-solid fa-layer-group"></i> Position -
                            {{ $teacher->position }}</p>
                        <p class="card-text"><i class="fa-solid fa-book"></i> Subject - {{ $teacher->subject }}
                        </p>

                        <p class="card-text"> <i class="fa-solid fa-location-dot"></i> Salary -
                            {{ $teacher->salary }}</p>
                            <br>
                            <hr>
                    @endforeach


            </div>
            <div class="col-md-4">
                @if (count($hirings) != 0)
                @foreach ($hirings as $hiring)
                    {{-- <p class="card-text fw-bold text-center">Hiring Status</p> --}}
                    <p class="card-text"> <i class="fa-solid fa-location-dot"></i> Student Name -
                        {{ $hiring->stuName }}</p>
                    <p class="card-text"> <i class="fa-solid fa-location-dot"></i> Current School -
                        {{ $hiring->currentSchool }}</p>
                    <p class="card-text"> <i class="fa-solid fa-location-dot"></i> Course -
                        {{ $hiring->tr_position }}</p>
                    <p class="card-text"> <i class="fa-solid fa-location-dot"></i> Subject -
                        {{ $hiring->subject }}</p><hr>
                @endforeach
            @else
                <p class="card-text"> No Hiring Status Yet!.</p>
            @endif
            @endif
            </div>
        </div>
    </div>
@endsection
