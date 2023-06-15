@extends('layouts.master')

@section('title', 'Tambah Data Dosen')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Form Tambah Data Dosen</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('dosen/'.$dosen->id.'/update') }}" method="post"> @csrf @method("PUT")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="nip" disabled value="{{ $dosen->nip }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('nip') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ $dosen->name }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">No. HP</label>
                                    <input type="text" class="form-control" name="no_hp" value="{{ $dosen->no_hp }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('no_hp') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat"  rows="2" class="form-control" placeholder="Alamat">{{ $dosen->alamat }}</textarea>
                                </div>
                                <small class="text-danger">{{ $errors->first('alamat') }}</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection