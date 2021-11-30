@extends('layouts.admin')
@section('title')
    Tambah
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-galeri.index') }}">Manage Galeri</a></li>
<li class="breadcrumb-item"><a href="#">Tambah</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('manage-galeri.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="judul" id="" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                    <option value="">Pilih Jenis Konten</option>
                                    <option value="gambar">Gambar</option>
                                    <option value="video">Video</option>
                                </select>
                                @error('jenis')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div id="input_konten"></div>
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
@section('script')
<script>
    $(document).ready(function() {
        $('#jenis').on('change', function() {
            var jenis = $(this).val();
            if (jenis == 'gambar') {
                var html = '<label>Gambar</label>'
                html += '<input class="form-control" type="file" name="konten" required>'
                $('#input_konten').html(html)
            } else if (jenis == 'video') {
                var html = '<label>ID Url Youtube</label>'
                html += '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">https://www.youtube.com/watch?v=</span></div>'
                html += '<input class="form-control" type="text" name="konten" required></div>'
                $('#input_konten').html(html)
            } else {
                html = ''
                $('#input_konten').html(html)
            }
        })
    })
</script>
@endsection
