@extends('template.index')
@section('title', 'Employees')

@push('css')
    <link href="{{ asset('template-admin') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>
    <p class="mb-4">
        Data Karyawan Indexim
    </p>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        <br>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Total Karyawan</h6>
            <h6 class="m-0 font-weight-bold text-primary">{{ count($users) }} Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NRP</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nrp }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->department }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ $user->shift->name ?? '' }}</td>
                                <td align="center">
                                    <a href="{{ route('employee.show', $user->id) }}" class="btn btn-primary"><i
                                            class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
