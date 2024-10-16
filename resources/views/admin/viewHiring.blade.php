@extends('adminHome')

@section('myContent')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Hiring Table</h3>

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
                @if (session('updateSuccess'))
                    <div class="row">
                        <div class="alert alert-success alert-dismissible fade show col-8 offset-2" role="alert">
                            <div>
                                <p>{{ session('updateSuccess') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    </div>
                @endif

                @if (session('updateHiring'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible fade show col-8 offset-2" role="alert">
                        <div>
                            <p>{{ session('updateHiring') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            @endif

                @if (count($hirings) != 0)
                <table class="table table-bordered border-primary">
                    <tr>
                        <th>Transaction SS</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Parent Name</th>
                        <th>Customer Phone</th>
                        <th>Customer Address</th>
                        <th>Teacher Name</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Fee</th>
                        <th>Action </th>
                    </tr>
                    @foreach ($hirings as $hiring)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $hiring->moneyPhoto) }}" alt="" width="200px">
                            </td>
                            <td>
                                {{ $hiring->stuName }}
                            </td>
                            <td>{{ $hiring->gender }}</td>
                            <td>{{ $hiring->parentName }}</td>
                            <td> {{ $hiring->customerPhone }} </td>
                            <td> {{ $hiring->customerAddress }} </td>
                            <td> {{ $hiring->teacherName }} <br>
                                <a href="{{ route('availableTr',[$hiring->teacherId]) }}">
                                    <button class="btn btn-primary">Available</button>
                                </a>
                            </td>
                            <td> {{ $hiring->tr_position }} </td>
                            <td> {{ $hiring->subject }} </td>
                            <td> {{ $hiring->fee }} </td>
                            <td>
                                @if ($hiring->confirm == 0)
                                    <a href="{{ route('admin#requestConfirm', [$hiring->id]) }}">
                                        <button class="btn btn-primary"><i
                                                class="fa-solid fa-pen-to-square"></i>Confirm</button>

                                    </a>
                                @endif
                                <a href="{{ route('admin#editHiring',[$hiring->id]) }}">
                                    <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Update</button>
                                </a>
                                <a href="{{ route('parent#delete',[$hiring->id]) }}">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</button>

                                </a>
                            </td>



                        </tr>
                    @endforeach
                </table>
                @else
                <div style="margin-bottom:200px;">
                    <p class="text-muted text-center mt-3" >There is no hiring requests yet! </p>

                </div>
                @endif

            </div>
        </div>
    </div>
@endsection
