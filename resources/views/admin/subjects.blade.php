@extends('adminHome')

@section('myContent')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="d-flex justify-content-between">
                    <h3>{{ $courseName }}</h3>
                    <p>Total Subject - {{ count($subjects) }}</p>
                    <button class="btn btn-dark rounded-pill "data-bs-toggle="modal" data-bs-target="#disablebackdrop">+ADD
                        SUBJECT</button>
                </div>
                <div>
                    <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Subject Inserting Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="">
                                        <form class=" shadow justify-content-center" method="POST" action="{{route('admin#insertSubject')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="cname" value="{{ $courseName }}">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Subject Name" aria-label="Recipient's username" aria-describedby="basic-addon2" name="sname">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <button class="btn btn-primary" type="submit">+Add</button>
                                                </span>
                                              </div>


                                    </div>

                                </div>

                            </form>

                            </div>

                        </div>
                    </div>
                </div><!-- End Disabled Backdrop Modal-->
                <div class="mt-3 ms-5">
                   @if (count($subjects) != null)
                   <table class="table table-primary table-striped text-center" style="width:50%;margin-bottom:150px;">
                    <tr>

                        <th>Subject Name</th>
                        <th></th>
                    </tr>

                    @foreach ($subjects as $subject )
                    <tr>
                        <td>{{ $subject->subjectName }} </td>
                        <td>

                            <a href="{{ route('admin#deleteSubject', [$subject->id]) }}">
                                <button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                @else
                <div style="margin-bottom:200px;">
                    <p class="text-muted text-center mt-3" >There is no subject added yet! </p>

                </div>
                   @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center fs-2">
                <a href="{{ url('admin/courses') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                Back
                </a>
            </div>
        </div>
    </div>

@endsection
