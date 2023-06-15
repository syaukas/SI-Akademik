@extends('layouts.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('title', 'Tambah Data Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Form Tambah Data Mahasiswa</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('mahasiswa/'.$mhs->id.'/update') }}" method="post"> @csrf @method("PUT")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">NIM</label>
                                    <input type="text" class="form-control" disabled name="nim" value="{{ $mhs->nim }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('nim') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ $mhs->name }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label for="">Jenis Kelamin</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check" style="">
                                            <input class="form-check-input" type="radio" {{ $mhs->jk == 'laki-laki' ? 'checked' : '' }} name="jk" id="jk1" value="laki-laki">
                                            <label class="form-check-label" for="jk1">
                                                Laki - Laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" {{   $mhs->jk == 'perempuan' ? 'checked' : '' }} name="jk" id="jk2" value="perempuan">
                                            <label class="form-check-label" for="jk2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('jk') }}</small>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" placeholder="" value="{{ $mhs->tgl_lahir }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('tgl_lahir') }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Jurusan</label>
                                    <select class="js-example-basic-single form-control form-control-lg" name="datajurusans_id">
                                        <option value="" disabled selected>Jurusan</option>
                                        @foreach ($jurusans as $row)
                                            <option {{  $mhs->datajurusans_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <small class="text-danger">{{ $errors->first('datajurusans_id') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Angkatan</label>
                                    <select name="angkatan" id="angkatan" class="form-control js-example-basic-single">
                                        <option value="" disabled selected> Angkatan</option>
                                        @for ($i = 2023; $i >= 2000; $i--)
                                        <option {{  $mhs->angkatan == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <small class="text-danger">{{ $errors->first('angkatan') }}</small>
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat"  rows="2" class="form-control" placeholder="Alamat">{{ $mhs->alamat }}</textarea>
                                </div>
                                <small class="text-danger">{{ $errors->first('alamat') }}</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Ubah Data</button>
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