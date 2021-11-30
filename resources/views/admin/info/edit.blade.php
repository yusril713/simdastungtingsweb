@extends('layouts.admin')
@section('title')
    Tambah
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-artikel.index') }}">Manage Artikel</a></li>
<li class="breadcrumb-item"><a href="#">Tambah</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('manage-info.update', [Crypt::encrypt($data->id)]) }}" method="post" onsubmit="return confirm('Yakin ingin menyimpan data tersebut?')">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Informasi Stunting</label>
                                <textarea name="info" class="ckeditor @error('info') is-invalid @enderror">{{ $data->info }}</textarea>
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
