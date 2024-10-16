@extends('adminHome')

@section('myContent')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>{{ $teacherName }}'s Schedule</h3>

                </div>

                {{-- @if (session('confirmSuccess'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible fade show col-8 offset-2" role="alert">
                        <div>
                            <p>{{ session('confirmSuccess') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            @endif --}}

                <div class="mt-3">

                    <ul>
                        @foreach ($scheduleLists as $s)

                            <li>{{ $s->section1 }}</li>
                            <li>{{ $s->section2 }}</li>
                            @if ($s->section3 != null)
                                <li>{{ $s->section3 }}</li>

                            @endif
                            @if ($s->section4 != null)
                                <li>{{ $s->section3 }}</li>

                            @endif

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
