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
                    <form action="{{ url('dosen/store') }}" method="post"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="nip" value="{{ old('nip') }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('nip') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">No. HP</label>
                                    <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                                </div>
                                <small class="text-danger">{{ $errors->first('no_hp') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat"  rows="2" class="form-control" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                </div>
                                <small class="text-danger">{{ $errors->first('alamat') }}</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection