@extends('adminHome')

@section('myContent')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Teacher Table</h3>

                </div>

                @if (session('confirmSuccess'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible fade show col-8 offset-2" role="alert">
                        <div>
                            <p>{{ session('confirmSuccess') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            @endif

            @if (session('doNotHave'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible fade show col-8 offset-2" role="alert">
                        <div>
                            <p>{{ session('doNotHave') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            @endif

                <div class="mt-3">
                    @if (count($teachers)!= 0)
                    <table class="table table-primary table-bordered w-25 ">
                        <tr>
                            <th>Photo</th>
                            <th>Position</th>
                            <th>Subject</th>
                            <th>Teacher Name</th>

                            <th>Salary</th>
                            <th>Student Card Photo</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Academic Year</th>
                            <th>Major</th>
                            <th>Address</th>
                            <th>Experience</th>
                            <th>Sections</th>
                            <th>Action</th>
                        </tr>
                            @foreach ($teachers as $teacher )
                            <tr>

                                <td>
                                    <img src="{{ asset('storage/'.$teacher->photo) }}" alt="" width="100px">
                                </td>
                                <td>{{ $teacher->position }}</td>
                                <td>{{ $teacher->subject }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->salary }}</td>
                                <td>
                                    <img src="{{asset('storage/'.$teacher->stuIDcard) }}" alt="" width="200px">
                                </td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->phno }}</td>
                                <td>{{ $teacher->gender }}</td>
                                <td>{{ $teacher->academicYear }}</td>
                                <td>{{ $teacher->major }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ $teacher->experience }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $teacher->section1 }}</li>
                                        <li>{{ $teacher->section2 }}</li>
                                        @if ($teacher->section3 !=null)
                                            <li>{{ $teacher->section3 }}</li>

                                        @endif
                                        @if ($teacher->section4 !=null)
                                            <li>{{ $teacher->section4 }}</li>

                                        @endif
                                    </ul>

                                        {{-- @foreach ($scheduleLists as $s)

                                        @endforeach --}}



                                    <a href="{{ route('viewHistory',[$teacher->name]) }}"> <button class="btn btn-dark">View History</button>
                                    </a>


                                </td>
                                <td>
                                    @if ($teacher->confirm == 0)
                                    <a href="{{ route('admin#confirmTr',[$teacher->id]) }}" >
                                        <button class="btn btn-primary" ><i class="fa-solid fa-pen-to-square"></i>Confirm</button>

                                    </a>
                                    @endif
                                    <a href="{{ route('admin#editTrForm',[$teacher->id]) }}">
                                        <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Update</button>

                                    </a>
                                    <a href="{{ route('admin#deleteTeacher',[$teacher->id]) }}">
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</button>

                                    </a>

                                </td>
                            </tr>

                            @endforeach
                    </table>
                    @else
                    <div style="margin-bottom:200px;">
                        <p class="text-muted text-center mt-3" >There is no waiting teachers yet! </p>

                    </div>
                    @endif
            </div>
        </div>
    </div>
@endsection
