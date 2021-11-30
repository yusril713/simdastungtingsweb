@extends('layouts.admin')
@section('title')
    Edit
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-artikel.index') }}">Manage Artikel</a></li>
<li class="breadcrumb-item"><a href="#">Edit</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('manage-artikel.update', [Crypt::encrypt($data->id)]) }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin menyimpan data tersebut?')">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ $data->judul }}">
                                @error('judul')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Url</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ url('/') }}/</span>
                                    </div>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $data->slug }}">
                                </div>
                                @error('slug')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Editor</label>
                                <input type="text" class="form-control @error('editor') is-invalid @enderror" name="editor" value="{{ $data->editor }}">
                                @error('editor')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $data->tanggal }}">
                                @error('tanggal')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Konten</label>
                                <textarea name="konten" class="ckeditor @error('konten') is-invalid @enderror">{{ $data->konten }}</textarea>
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
