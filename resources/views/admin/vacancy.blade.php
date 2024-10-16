@extends('adminHome')

@section('myContent')
    <div class="container bg-light">
        <div class="row">
            <div class="col-12 ">
                <div class="d-flex justify-content-between">
                    <h3>Vacancy Table</h3>
                    <button class="btn btn-dark rounded-pill " data-bs-toggle="modal" data-bs-target="#disablebackdrop">+ADD
                        Vacancy</button>
                </div>
                <div>
                    <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Vacancy Inserting Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="">
                                        <form class=" shadow justify-content-center" method="POST" action="{{route('admin#insertVacancy')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Course Name</label>
                                                <input type="text" class="form-control @error('courseName') is-invalid  @enderror" placeholder="Course name" name="courseName" value="{{ old('courseName') }}">
                                                @error('courseName')
                                                <div class="invalid-feedback mb-3">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label>Subject Name</label>
                                                <input type="text" class="form-control @error('subjectName') is-invalid  @enderror" placeholder="Subject name" name="subjectName" value="{{ old('subjectName') }}">
                                                @error('subjectName')
                                                <div class="invalid-feedback mb-3">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label>Salary</label>
                                                <input type="text" class="form-control @error('salary') is-invalid  @enderror" placeholder="salary" name="salary" value="{{ old('salary') }}">
                                                @error('salary')
                                                <div class="invalid-feedback mb-3">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label>Description</label>
                                                <input type="text" class="form-control @error('description') is-invalid  @enderror" placeholder="description" name="description" value="{{ old('description') }}">
                                                @error('description')
                                                <div class="invalid-feedback mb-3">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">+ Add</button>
                                </div>
                            </form>

                            </div>

                        </div>
                    </div>
                </div><!-- End Disabled Backdrop Modal-->

            </div>
            <div class="mt-3">
                @if (count($vacancies)!= 0)
                <table class="table table-primary table-striped " class="margin-bottom:150px;">
                    <tr>
                        <th>Course Name</th>
                        <th>Subject Name</th>
                        <th>Salary</th>
                        <th>Description</th>
                        <th>Applied Teacher</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>


                    @foreach ($vacancies as $vacancy)
                        <tr>
                            <td>{{ $vacancy->courseName }}</td>
                            <td> {{ $vacancy->subjectName }} </td>
                            <td>{{ $vacancy->salary }}</td>
                            <td>{{ $vacancy->description }}</td>
                            <td>{{ $vacancy->count }}</td>
                            <td>{{ $vacancy->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('admin#editVacancy',[$vacancy->id]) }}">
                                    <button class="btn btn-success" ><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>

                                </a>
                                <a href="{{ route('admin#deleteVacancy', [$vacancy->id]) }}">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button>

                                </a>
                            </td>


                        </tr>
                    @endforeach

                </table>
                @else
                <div style="margin-bottom:200px;">
                    <p class="text-muted text-center mt-3" >There is no vacancy added yet! </p>

                </div>
                @endif

            </div>


        </div>
    </div>
    </div>
@endsection
