@extends('adminHome')

@section('myContent')
<div class="insertform">
    <div class="container">


      <div class="row">
        <div class="col-6 offset-3 shadow rounded-1 mt-4 " >
            <h3 class="text-center">Edit Course</h3>
            <form class=" shadow justify-content-center pb-5 p-3" enctype="multipart/form-data" method="post" action="{{ url('admin/updateCourse') }}" >
                @csrf
                <input type="hidden" name="courseId" value="{{ $course->id }}">
                <div class="mb-3">
                    <label>Course Name</label>
                    <input type="text" class="form-control @error('name') is-invalid  @enderror" placeholder="Course name" name="name" value="{{ old('name',$course->CourseName) }}">
                    @error('name')
                    <div class="invalid-feedback mb-3">
                    {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="mb-5">
                        <label for="formFile" class="form-label">Course Photo</label><br>
                        <img src="{{ asset('storage/'.$course->Photo) }}" alt="" width="100px">

                        <input class="form-control" type="file" id="formFile" name="photo">

                    </div>
                </div>
                <div class="text-center ">
                    <button class="btn btn-success " type="submit">Edit Course</button>
                </div>
          </form>
        </div>
      </div>
@endsection
