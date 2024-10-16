@extends('adminHome')

@section('myContent')
<div class="insertform">
    <div class="container">


      <div class="row">
        <div class="col-6 offset-3 shadow rounded-1 mt-4 ">
            <h3 class="text-center">Edit Vacancy</h3>
            <form class=" shadow justify-content-center pb-5 p-3" enctype="multipart/form-data" method="post" action="{{ url('admin/updateVacancy') }}">
                @csrf
                <input type="hidden" name="courseId" value="{{ $vacancy->id }}">
                <div class="mb-3">
                    <label>Course Name</label>
                    <input type="text" class="form-control @error('name') is-invalid  @enderror" placeholder="Course name" name="name" value="{{ old('name',$vacancy->courseName) }}">
                    @error('cname')
                    <div class="invalid-feedback mb-3">
                    {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Subject Name</label>
                    <input type="text" class="form-control @error('sname') is-invalid  @enderror" placeholder="Subject name" name="sname" value="{{ old('sname',$vacancy->subjectName) }}">
                    @error('sname')
                    <div class="invalid-feedback mb-3">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Salary</label>
                    <input type="text" class="form-control @error('salary') is-invalid  @enderror" placeholder="salary" name="salary" value="{{ old('salary',$vacancy->salary) }}">
                    @error('salary')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" class="form-control @error('description') is-invalid  @enderror" placeholder="description" name="description" value="{{ old('description',$vacancy->description) }}">
                    @error('description')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="text-center ">
                    <button class="btn btn-warning " type="submit">Update Vacancy</button>
                </div>
          </form>
        </div>
      </div>
@endsection
