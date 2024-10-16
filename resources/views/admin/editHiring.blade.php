@extends('adminHome')

@section('myContent')

        <div class="insertform">
        <div class="container">
        <div class="row">
        <div class="col-8 offset-2 shadow rounded-2 mt-4" style="background-color: #A1D0E3;">
        <form class="m-3 p-3 "  enctype="multipart/form-data" method="POST" action="{{ route('parent#update') }}" >
            @csrf
        <header class="section-header">

        <h2 align="center">Edit Hiring Form</h2>

            <input type="hidden" name="hid" value="{{$hiring->id}}">
        <label for="position" class="col-sm-6 form-label">Student Name</label>
        <input type="text" class="form-control mb-3 @error('studentName') is-invalid @enderror" id="sname" value="{{ old('studentName', $hiring->stuName) }}" name="studentName">
        @error('studentName')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="position" class="col-sm-6 form-label">Current School</label>
        <input type="text" class="form-control mb-3 @error('schoolName') is-invalid @enderror" id="school" value="{{ old('schoolName', $hiring->currentSchool) }}" name="schoolName">
        @error('schoolName')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror




        <label for="position" class="col-sm-6 form-label">Parent Name</label>
        <input type="text" class="form-control mb-3 @error('parentName') is-invalid @enderror" id="pname" name="parentName" value="{{ old('parentName', $hiring->parentName) }}">
        @error('parentName')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <input type="number" class="form-control mb-3  @error('userPh') is-invalid @enderror"  name="userPh" value="{{ old('userPh', $hiring->customerPhone) }}">
        @error('userPh')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <input type="text" class="form-control mb-3  @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $hiring->customerAddress) }}">
        @error('address')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror


        <label for="" class="form-label mb-3">ငွေလွှဲ screenshot  </label><br>
        <img src="{{ asset('storage/'.$hiring->moneyPhoto) }}" alt="" width="100px" class="mb-3">
        <input type="file" name="kpayss" class="form-control @error('kpayss')
        is-invalid
        @enderror">
        @error('kpayss')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
          @enderror

        <div class="d-flex justify-content-md-end mt-5 ">
            <button type="submit" class="btn btn-warning btn-lg" name="sendBtn">Update</button>
        </div>



        </div>
        </div>
        </div>
        </div>

        @endsection
