@extends('template.index')
@section('title')
    Profile {{ $user->name }}
@endsection
@push('css')
    <link href="{{ asset('template-admin') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Profile Karyawan {{ $user->name }} </h1>
    <p class="mb-4">
        Profile karyawan mengenai data pribadi, kinerja, riwayat pekerjaan, dan absensi
    </p>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        <br>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="card p-4 w-full">
                <div class="text-center mb-3">
                    <img src="{{ asset('image/blank-user.png') }}" class="img-fluid rounded-circle mb-2"
                        style="height: 250px; width:250px" alt="...">
                </div>
                <div class="text-center mb-3">
                    <h2 class="font-weight-bold"> {{ $user->name }}</h2>
                    {{-- <p>Leader :</p>
                    <p>{{$user->leaders ?? ''}}</p> --}}
                </div>
                <div class="d-flex justify-content-around mb-4">
                    <h6>Status Kinerja</h6>
                    :
                    <span class="text-success">Sangat Baik</span>
                </div>
                <div class=" text-center mb-4">
                    <h6>Task Completed</h6>
                    <h5>100</h5>
                </div>
                <div class=" text-center">
                    <h6>Attendance</h6>
                    <h5>100</h5>
                </div>
            </div>
        </div>
        <div class="col-8 mb-5">
            <div class="card p-4 w-full">
                <div class="card-tools mb-3">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#settings" data-toggle="tab">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#anggota" data-toggle="tab">Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#work" data-toggle="tab">Riwayat Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#attendance" data-toggle="tab">Riwayat Absensi</a>
                        </li>
                    </ul>
                </div>
                <div class="card p-3 mb-7">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="settings">
                            <span class="text-danger font-weight-bold mb-4">Informasi Pribadi </span>
                            <form action="{{route('employee.update',$user->id)}}" method="POST" type="multipart/form-data">
                                 @method('PATCH')
                                @csrf
                                <div class="mb-3 mt-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nrp" class="form-label">NRP</label>
                                    <input type="text" class="form-control  @error('nrp') is-invalid @enderror"
                                        id="nrp" name="nrp" value="{{ $user->nrp }}">
                                    @error('nrp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ $user->email }}">
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
                                            class="form-control  @error('department') is-invalid @enderror" id="department"
                                            value="{{ $user->department }}">
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="input"
                                            name="position"class="form-control @error('position') is-invalid @enderror"
                                            id="position" value="{{ $user->position }}">
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="shift_id" class="form-label">Shift</label>
                                    <select id="shift_id" name="shift_id"
                                        class="form-control @error('shift_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="">--- Pilih Shift ---</option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{ $shift->id }}"
                                                {{ $user->shift_id == $shift->id ? 'selected' : '' }}>{{ $shift->name }}
                                            </option>
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
                                    <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ $user->username }}" readonly>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password">
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <div class="chart tab-pane" id="work">
                            Riwayat Kerja
                        </div>
                        <div class="chart tab-pane" id="attendance">
                            <h4 class="mb-3">Absensi</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Deskripsi</th>
                                            <th>Total Primary</th>
                                            <th>Total Overtime</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($user->attendances as $attendance)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $attendance->created_at->format('d F Y') }}</td>
                                                <td>{{ $attendance->start_at }}</td>
                                                <td>{{ $attendance->end_at }}</td>
                                                <td>{{ $attendance->description }}</td>
                                                <td>{{ $attendance->total_primary }}</td>
                                                <td>{{ $attendance->total_overtime }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="chart tab-pane" id="anggota">
                            bawahan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('template-admin') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template-admin') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('template-admin') }}/js/demo/datatables-demo.js"></script>
@endpush
