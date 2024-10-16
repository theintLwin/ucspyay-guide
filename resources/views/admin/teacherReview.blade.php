@extends('adminHome')

@section('myContent')
<div class="container bg-light">
    <div class="row">
        <div class="col-12 ">
            <div class="d-flex justify-content-between">
                <h3>Reviews To {{$receiver}}</h3>
                {{-- <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="get" action="{{ route('admin#viewCurrentTeacher') }}">
                      @csrf
                      <input type="text" name="trName" placeholder="Search" title="Enter teacher name to search.." value="{{ request('trName') }}">
                      <button type="submit" title="Search" class="btn btn-dark"><i class="bi bi-search"></i></button>
                    </form>
                  </div><!-- End Search Bar --> --}}
            </div>
            {{-- <div>
                <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Course Inserting Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="">
                                    <form class=" shadow justify-content-center" method="POST" action="{{route('admin#insertCourse')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label>Course Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid  @enderror" placeholder="Course name" name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback mb-3">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Course Photo</label>
                                                <input class="form-control @error('photo') is-invalid  @enderror" type="file" id="formFile" name="photo">
                                                @error('photo')
                                                <div class="invalid-feedback mb-3">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
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
            </div><!-- End Disabled Backdrop Modal--> --}}

        </div>
        <div class="mt-3">
            @if (count($reviews)!= 0)
            <table class="table table-primary table-striped"  >
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message </th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

                {{-- <tr>
                    <td>Grade-10</td>
                    <td style="width:25%"><img src="{{ asset('img/Grade10.jpg') }}" alt="" class="w-25"></td>

                    <td><a href="#"><button class="btn btn-dark">view subjects</button></a></td>
                    <td>12-12-2023</td>
                    <td>
                        <button class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</button>
                    </td>
                </tr> --}}
                @foreach ($reviews as $review)
                    <tr >
                        <td>
                            @if ($review->photo != null)
                            <img src="{{ asset('storage/'.$review->photo) }}" alt="" width="100px">
                            @else
                            <img src="{{ asset('img/profile.png') }}" alt="" width="100px">

                            @endif
                        </td>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->email }}</td>
                        <td>{{ $review->message }}</td>
                        <td>{{ $review->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('delete#review',[$review->id]) }}" >
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</button>
                             </a>
                        </td>

                    </tr>
                @endforeach

            </table>
            @else
            <div style="margin-bottom:200px;">
                <p class="text-muted text-center mt-3" >There is no review yet! </p>

            </div>
            @endif
                 {{-- {{ $courses->links() }} --}}


        </div>



    </div>
</div>
</div>
@endsection
