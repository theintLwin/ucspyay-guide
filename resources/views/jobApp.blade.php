@extends('UserHome')

@section('myContent')
<div class="insertform">
    <div class="container">


        <div class="row">
            <div class="col-8 offset-2 shadow rounded-1" style="background-color:#86B6F6">
                <form class="m-3 p-3 " action="{{ route('teacher#add') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <header class="section-header">
                        <h2><i class="fa-brands fa-wpforms fs-1 fw-bolder text-start"></i></h2>
                        <p class="">Job Application</p>
                    </header>
                    @if (session('error'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible fade show col-8 offset-2" role="alert">
                        <div>
                            <p>{{ session('error') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            @endif
                    <input type="hidden" name="vid" value="{{ $vid }}">
                    <label for="position" class="col-sm-6 form-label">Place you applied</label>
                    <input type="text" class="form-control mb-3 @error('position') is-invalid  @enderror"
                        id="text" name="position" value="{{ old('position', $job->courseName) }}" readonly>
                    @error('position')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="position" class="col-sm-6 form-label">Subject</label>
                    <input type="text" class="form-control mb-3 @error('subject') is-invalid  @enderror"
                        id="text" name="subject" value="{{ old('subject', $job->subjectName) }}" readonly>
                    @error('subject')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror


                    <label for="position" class="col-sm-6 form-label">Salary(Kyats)</label>
                    <input type="number" class="form-control mb-3 @error('salary') is-invalid  @enderror"
                        id="salary" name="salary" value="{{ old('salary', $job->salary) }}" readonly>
                    @error('salary')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Photo</label>
                        <input type="file" class="form-control @error('photo') is-invalid  @enderror"
                            id="exampleFormControlInput1" name="photo">
                    </div>
                    @error('photo')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="name" class="col-sm-6 col-form-label">Name</label>
                    <input type="text" class="form-control mb-3 @error('userName') is-invalid  @enderror"
                        name="userName" value="{{ old('userName') }}">
                    @error('userName')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <input type="email" class="form-control mb-3 @error('userEmail') is-invalid  @enderror"
                        name="userEmail" value="{{ old('userEmail') }}">
                    @error('userEmail')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <input type="number" class="form-control mb-3 @error('userPh') is-invalid  @enderror"
                        name="userPh" value="{{ old('userPh') }}">
                    @error('userPh')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="address" class="col-sm-2 col-form-label">Address</label>

                        <textarea cols="30" rows="5" class="form-control mb-3 @error('address') is-invalid  @enderror" id="address" name="address">
                            {{ old('address') }}
                        </textarea>
                    @error('address')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="d-flex justify-content-around my-4">
                        Gender

                        <div class="form-check ">

                            <input class="form-check-input" type="radio" name="gender" value="Male"
                                class="@error('gender') is-invalid  @enderror">
                            <label class="form-check-label" for="flexRadioDefault1">Male</label>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Female"
                                class="@error('gender') is-invalid  @enderror">
                            <label class="form-check-label" for="flexRadioDefault2">Female </label>

                        </div>

                    </div>
                    @error('gender')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> Student ID Card</label>
                        <input type="file" id="exampleFormControlInput1"
                            class="form-control @error('stuIDphoto') is-invalid  @enderror" name="stuIDphoto">
                    </div>

                    <label for="academicYear" class="col-sm-6 col-form-label">Academic Year</label>

                    <select class="form-select mb-3 @error('academicYear')  is-invalid @enderror"
                        name="academicYear" value="{{ old('academicYear') }}">
                        <option @if (old('academicYear') == 'First Year') selected @endif>First Year</option>
                        <option @if (old('academicYear') == 'Second Year') selected @endif>Second Year</option>
                        <option @if (old('academicYear') == 'Third Year') selected @endif>Third Year</option>
                        <option @if (old('academicYear') == 'Fourth Year') selected @endif>Fourth Year</option>
                        <option @if (old('academicYear') == 'Fifth Year') selected @endif>Fifth Year</option>
                    </select>


                    <label for="major" class="col-sm-2 col-form-label">Major</label>
                    <select class="form-select mb-3 @error('major') is-invalid @enderror" name="major">
                        <option @if (old('major') == 'Computer Science') selected @endif>Computer Science</option>
                        <option @if (old('major') == 'Computer Technology') selected @endif>Computer Technology</option>
                    </select>





                    <label for="experience" class="col-sm-2 col-form-label">Experience</label>
                    <select class="form-select mb-3 " name="exp">
                        <option @if (old('exp') == 'No Experience') selected @endif>No Experience</option>
                        <option @if (old('exp') == 'One Year') selected @endif>One Year</option>
                        <option @if (old('exp') == 'Two Year') selected @endif>Two Years</option>
                        <option @if (old('exp') == 'More than Two Years') selected @endif>More than Two Years</option>
                    </select><br>

                    <label for="time" class="col-sm-12 col-form-label">Your available hour <br>
                        <spam style="color:red;">Select <b>Four </b>times per course. *From Grade-1 To Grade-9.*
                        </spam><br>
                        <spam style="color:red;">Select <b>Two </b>times per subject. *From Grade-10 To Grade-12.*
                        </spam><br>
                        <spam style="color:red;">Select <b>Three </b>times per other course. (Computer BASIC/Programming/Languages)
                        </spam>
                    </label>
                    @error('schedule')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <input class="form-check-input" type="checkbox" id="monday" value="monday(5PM to 7PM)"
                        name="schedule[]">
                    <label class="form-check-label">Monday (5PM to 7PM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="tuedsay(5PM to 7PM)"
                        name="schedule[]">
                    <label class="form-check-label">Tuesday (5PM to 7PM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="wednesday(5PM to 7PM)"
                        name="schedule[]">
                    <label class="form-check-label">Wednesday (5PM to 7PM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="thursday(5PM to 7PM)"
                        name="schedule[]">
                    <label class="form-check-label">Thursday (5PM to 7PM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="friday(5PM to 7PM)"
                        name="schedule[]">
                    <label class="form-check-label">Friday (5PM to 7PM)</label><br>
                    <input class="form-check-input" type="checkbox" id="check1" value="saturday(8AM to 10AM)"
                        name="schedule[]">
                    <label class="form-check-label">Saturday (8AM to 10AM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1"
                        value="saturday(10AM to 12PM)" name="schedule[]">
                    <label class="form-check-label">Saturday (10AM to 12PM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="saturday(4PM to 6PM)"
                        name="schedule[]">
                    <label class="form-check-label">Saturday (4PM to 6PM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="sunday(8AM to 10AM)"
                        name="schedule[]">
                    <label class="form-check-label">Sunday (8AM to 10AM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="sunday(10AM to 12PM)"
                        name="schedule[]">
                    <label class="form-check-label">Sunday (10AM to 12PM)</label><br>

                    <input class="form-check-input" type="checkbox" id="check1" value="sunday(4PM to 6PM)"
                        name="schedule[]" @if (old('schedule[]') == 'sunday(4PM to 6PM)') checked @endif>
                    <label class="form-check-label">Sunday (4PM to 6PM)</label><br>



                    <div class=" text-end mt-5">
                        <button type="submit" class="btn btn-primary w-25 fs-5 rounded-pill" name="sendBtn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
