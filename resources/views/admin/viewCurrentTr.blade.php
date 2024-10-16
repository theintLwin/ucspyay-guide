@extends('adminHome')

@section('myContent')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Teacher Table</h3>

                    {{-- Search Box --}}
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="{{ route('admin#viewCurrentTeacher') }}">
        @csrf
        <input type="text" name="trName" placeholder="Search" title="Enter teacher name to search.." value="{{ request('trName') }}">
        <button type="submit" title="Search" class="btn btn-dark"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->



    <a href="{{ route('admin#addTeacherForm') }}">
        <button class="btn btn-dark rounded-pill ">+ADD Teacher</button>

    </a>
                </div>

                <div class="mt-3">
                    @if (count($teachers)!= 0)
                    <table class="table table-primary table-bordered w-25 " >
                        <tr>
                            <th>Photo</th>
                            <th>Position</th>
                            <th>Subject</th>
                            <th>Teacher Name</th>
                            <th>Salary</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Academic Year</th>
                            <th>Major</th>
                            <th>Address</th>
                            <th>Experience</th>
                            <th>Sections</th>
                            <th></th>
                            <th></th>
                        </tr>
                            @foreach ($teachers as $teacher )
                            <tr>

                                <td>
                                    <img src="{{ asset('storage/'.$teacher->photo) }}" alt="" width="200px">
                                </td>
                                <td>{{ $teacher->position }}</td>
                                <td>{{ $teacher->subject }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->salary }}</td>
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
                                </td>
                                <td>
                                    @if ($teacher->hiring_status == 1)
                                        <a href="">
                                            <button>being hired</button>
                                        </a>
                                        @else
                                        <a href="">
                                            <button class="btn btn-dark">available</button>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin#editTrForm',[$teacher->id]) }}">
                                        <button class="btn btn-success" ><i class="fa-solid fa-pen-to-square"></i>Edit</button>

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
                        <p class="text-muted text-center mt-3" >There is no current teachers yet! </p>

                    </div>
                    @endif
            </div>
        </div>
    </div>
@endsection
