@extends('template.index')
@section('title', 'List of Shift')
@push('css')
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Shift Management</h1>
    <p class="mb-4">
        Data shift untuk jam kerja karyawan
    </p>

    <div class="card p-4 w-full">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            <br>
        @endif
        <div class="row">
            <div class="col-5">
                <div class="card p-3 shadow-sm">
                    <h4>Tambah Data Shift</h4>
                    <div class="grid p-2">
                        <form action="{{ route('shift.store') }}" method="POST" type="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="start_at" class="form-label">Jam Masuk</label>
                                    <input type="time" name="start_at"class="form-control" id="start_at">
                                </div>
                                <div class="col mb-3">
                                    <label for="end_at" class="form-label">Jam Keluar</label>
                                    <input type="time" name="end_at"class="form-control" id="end_at">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="card col-7 p-3">
                <h4 class="mb-4">List of Shift</h4>

                @foreach ($shifts as $shift)
                    <!-- Dropdown Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary fs-1">Shift {{ $shift->name }}</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    {{-- <div class="dropdown-header">Dropdown Header:</div> --}}
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="d-flex justify-content-around items-center">
                                <p>Waktu Masuk : {{ $shift->start_at }}</p>
                                ----
                                <p>Waktu Keluar : {{ $shift->end_at }}</p>
                            </div>
                            <label class="form-label">Total hours : {{ $shift->total_hours }}</label>
                            <div class="">
                                <label for="" class="form-label"> Description : </label>
                                <p>
                                    {{ $shift->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection

@push('js')
@endpush
