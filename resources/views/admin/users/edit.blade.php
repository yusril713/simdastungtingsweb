@extends('layouts.admin')
@section('title')
    Edit
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-instansi.index') }}">Manage Users</a></li>
<li class="breadcrumb-item"><a href="#">Edit</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('manage-users.update', [Crypt::encrypt($data->id)]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" id="" class="form-control @error('nama') is-invalid @enderror" value="{{ $data->name }}">
                                @error('v')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}">
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="">Instansi</label>
                                <select name="instansi" id="" class="form-control @error('instansi') is-invalid @enderror">
                                    <option value="">Pilih instansi</option>
                                    @foreach ($instansi as $item)
                                        <option value="{{ $item->id }}" {{ isset($data->instansi->id) == $item->id ? 'selected' : '' }}>{{ $item->nama_instansi }}</option>
                                    @endforeach
                                </select>
                                @error('instansi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Pria" {{ $data->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ $data->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ $data->no_telp }}" >
                                @error('no_telp')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="Alamat" id="" class="form-control">{{ old('alamat') }}</textarea>
                            </div>

                            <div class="form-group">
                                <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">Pilih Role</option>
                                    @foreach ($role as $item)
                                        <option value="{{ $item->name }}" {{ $data->roles[0]->name == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
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
