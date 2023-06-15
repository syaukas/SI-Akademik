@extends('layouts.master')

@section('title', 'Nilai')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <style>
        .page-link, .page-item span {
            width:  0 !important;
            height:  0 !important;
            border-radius: 10px !important;
            padding: 20px !important;
        }
        .page-item.active .page-link {
            color: white;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row ">
                    <div class="col-md-6">
                        <h6>Data Nilai</h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ url('/nilai/create') }}" class="btn btn-success btn-sm">+ Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive border p-2">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Pengajar</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                                <th>Nilai Akhir</th>
                                <th>Index</th>
                                <th>Predikat</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilais as $row)
                            <tr>
                                <td>{{ $row->mahasiswa->name }} <br> {{ $row->mahasiswa->nim }}</td>
                                <td>{{ $row->matkul->name }}</td>
                                <td>{{ $row->matkul->dosen->name }} <br> {{ $row->matkul->dosen->nip }}</td>
                                <td>{{ $row->nilai_uts }}</td>
                                <td>{{ $row->nilai_uas }}</td>
                                <td>{{ $row->nilai_akhir }}</td>
                                <td>{{ $row->index }}</td>
                                <td>{{ $row->predikat }}</td>
                                <td>
                                    <a href="{{ url('nilai/'.$row->id.'/edit') }}" class="btn btn-warning btn-sm text-white">Edit</a>
                                    <a href="{{ url('nilai/'.$row->id.'/destroy') }}" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Pengajar</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                                <th>Nilai Akhir</th>
                                <th>Index</th>
                                <th>Predikat</th>
                                <th>Menu</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

@endsection