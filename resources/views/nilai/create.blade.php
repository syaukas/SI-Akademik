@extends('layouts.master')

@section('title', 'Tambah Data Nilai')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Form Tambah Data Nilai</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('nilai/store') }}" method="post"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Mahasiswa</label>
                                <select class="js-example-basic-single form-control form-control-lg" name="mahasiswas_id">
                                    <option value="" disabled selected>Mahasiswa</option>
                                    @foreach ($mahasiswas as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }} - {{ $row->nim }}</option>
                                    @endforeach
                                  </select>
                                    <small class="text-danger">{{ $errors->first('mahasiswas_id') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Mata Kuliah</label>
                                <select class="js-example-basic-single form-control form-control-lg" name="matkuls_id">
                                    <option value="" disabled selected>Mata Kuliah - Dosen Pengajar</option>
                                    @foreach ($matkuls as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }} - {{ $row->dosen->name }}</option>
                                    @endforeach
                                  </select>
                                    <small class="text-danger">{{ $errors->first('matkuls_id') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Nilai UTS</label>
                                    <input type="number" class="form-control" name="nilai_uts" value="{{ old('nilai_uts') }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('nilai_uts') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Nilai UAS</label>
                                    <input type="number" class="form-control" name="nilai_uas" value="{{ old('nilai_uas') }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('nilai_uas') }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Unit</label>
                                    <select class="js-example-basic-single form-control form-control-lg" name="unit">
                                        <option value="" disabled selected>Unit</option>
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                      </select>
                                </div>
                                <small class="text-danger">{{ $errors->first('unit') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Tahun Ajaran</label>
                                    <select class="js-example-basic-single form-control form-control-lg" name="tahun_ajar">
                                        <option value="" disabled selected>Tahun Ajaran</option>
                                        @for ($i = 2019; $i < 2025; $i++)
                                            <option value="{{ $i . ' / ' . ($i+1) }}">{{ $i . ' / ' . ($i+1) }}</option>
                                        @endfor
                                      </select>
                                </div>
                                <small class="text-danger">{{ $errors->first('tahun_ajar') }}</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    </script>
@endsection