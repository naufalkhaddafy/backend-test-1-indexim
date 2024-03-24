@extends('template.index')
@section('title')
    Profile {{ $user->name }}
@endsection
@push('css')
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Profile Karyawan {{ $user->name }} </h1>
    <p class="mb-4">
        Profile karyawan mengenai data pribadi, kinerja, riwayat pekerjaan, dan absensi
    </p>

    <div class="card p-4 w-full">

        {{-- <div class="">
            <h4>Tambah Data Karyawan</h4>
            <div class="grid p-2">
                <form action="{{ route('employee.store') }}" method="POST" type="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nrp" class="form-label">NRP</label>
                        <input type="text" class="form-control  @error('nrp') is-invalid @enderror" id="nrp"
                            name="nrp">
                        @error('nrp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                            name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="input" name="department"
                                class="form-control  @error('department') is-invalid @enderror" id="department">
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="input"
                                name="position"class="form-control @error('position') is-invalid @enderror" id="position">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="shift_id" class="form-label">Shift</label>
                        <select id="shift_id" name="shift_id" class="form-control @error('shift_id') is-invalid @enderror"
                            aria-label="Default select example">
                            <option value="" selected>--- Pilih Shift ---</option>
                            @foreach ($shifts as $shift)
                                <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                            @endforeach
                        </select>
                        @error('shift_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <span class="text-danger font-weight-bold">Untuk Login Karyawan </span>
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                            name="username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div> --}}
    </div>
@endsection

@push('js')
@endpush
