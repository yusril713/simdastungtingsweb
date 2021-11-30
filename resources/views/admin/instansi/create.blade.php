@extends('layouts.admin')
@section('title')
    Tambah
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-instansi.index') }}">Manage Instansi</a></li>
<li class="breadcrumb-item"><a href="#">Tambah</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('manage-instansi.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode Instansi</label>
                                <input type="text" name="kode_instansi" id="" class="form-control @error('kode_instansi') is-invalid @enderror" value="{{ old('kode_instansi') }}">
                                @error('kode_instansi')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Nama Instansi</label>
                                <input type="text" name="nama_instansi" id="" class="form-control @error('nama_instansi') is-invalid @enderror" value="{{ old('nama_instansi') }}">
                                @error('nama_instansi')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
