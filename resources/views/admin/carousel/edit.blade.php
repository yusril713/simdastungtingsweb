@extends('layouts.admin')
@section('title')
    Edit
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-carousel.index') }}">Manage Carousel</a></li>
<li class="breadcrumb-item"><a href="#">Edit</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <form action="{{ route('manage-carousel.update', [Crypt::encrypt($data->id)]) }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin menyimpan data tersebut?')">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <img src="{{ $data->img_source }}" alt="">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status')
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
