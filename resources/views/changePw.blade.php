@extends('adminHome')

@section('myContent')
    <div class="container">
        @if (session('notMatch'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible fade show col-8 offset-2" role="alert">
                        <div>
                            <p>{{ session('notMatch') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            @endif

        <div class="row ">

            <div class="col-6 offset-2">
                <h3>Change Password</h3>
                {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

                <form class=" shadow justify-content-center p-4" method="POST" action="{{ route('cgPassword') }}" style="background-color: #6897ed;"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label> Old Password</label>
                        <input type="password" class="form-control @error('oldPassword') is-invalid  @enderror"
                            placeholder="Enter old password" name="oldPassword" value="{{ old('oldPassword') }}">
                        @error('oldPassword')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label"> New Password</label>
                            <input class="form-control @error('newPassword') is-invalid  @enderror" type="password" id="formFile"
                                name="newPassword" placeholder="Enter new password">
                            @error('newPassword')
                                <div class="invalid-feedback mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label"> Confirm Password</label>
                            <input class="form-control @error('confirmPassword') is-invalid  @enderror" type="password" id="formFile"
                                name="confirmPassword" placeholder="Enter confirm password">
                            @error('confirmPassword')
                                <div class="invalid-feedback mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mx-auto">                            <i class="fa-solid fa-key"></i>
                                Change Password</button>
                        </div>
            </div>

        </div>
    </div>
@endsection
