@extends('template.index')
@section('title', 'Laporan Absensi')

@push('css')
    <link href="{{ asset('template-admin') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Laporan Absensi</h1>
    <p class="mb-4">
        Data Absensi Karyawan
    </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th> Nama (NRP)</th>
                            <th>Tanggal</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Deskripsi</th>
                            <th>Total Primary</th>
                            <th>Total Overtime</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->user->name }}({{ $attendance->user->nrp }})</td>
                                <td>{{ $attendance->created_at->format('d F Y') }}</td>
                                <td>{{ $attendance->start_at }}</td>
                                <td>{{ $attendance->end_at }}</td>
                                <td>{{ $attendance->description }}</td>
                                <td>{{ $attendance->total_primary }}</td>
                                <td>{{ $attendance->total_overtime }}</td>
                                <td>
                                    <button>Detail</button>
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
