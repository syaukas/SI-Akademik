@extends('layouts.master')

@section('title', 'Tambah Data Mata Kuliah')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Form Tambah Data Mata Kuliah</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('matkul/store') }}" method="post"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Mata Kuliah</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">SKS</label>
                                    <input type="number" class="form-control" name="sks" value="{{ old('sks') }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('sks') }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Dosen Pengajar</label>
                                <select class="js-example-basic-single form-control form-control-lg" name="dosens_id">
                                    <option value="" disabled selected>Dosen</option>
                                    @foreach ($dosens as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                  </select>
                                    <small class="text-danger">{{ $errors->first('dosens_id') }}</small>
                                </div>
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