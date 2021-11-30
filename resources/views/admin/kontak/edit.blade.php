@extends('layouts.admin')
@section('title')
    Tambah
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-kontak.index') }}">Manage Kontak</a></li>
<li class="breadcrumb-item"><a href="#">Tambah</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('manage-kontak.update', [Crypt::encrypt($data->id)]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="text" name="email" id="" class="form-control" value="{{ $data->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Phoen</label>
                                <input type="text" name="phone" id="" class="form-control" value="{{ $data->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook" id="" class="form-control" value="{{ $data->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="">Twitter</label>
                                <input type="text" name="twitter" id="" class="form-control" value="{{ $data->twitter }}">
                            </div>
                            <div class="form-group">
                                <label for="">Instagram</label>
                                <input type="text" name="instagram" id="" class="form-control" value="{{ $data->instagram }}">
                            </div>
                            <div class="form-group">
                                <label for="">Location</label>
                                <input type="text" name="location" id="" class="form-control" value="{{ $data->location }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
