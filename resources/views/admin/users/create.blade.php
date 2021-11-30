@extends('layouts.admin')
@section('title')
    Tambah
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-instansi.index') }}">Manage Users</a></li>
<li class="breadcrumb-item"><a href="#">Tambah</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('manage-users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" id="" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                @error('v')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                                @error('password')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
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
                                        <option value="{{ $item->id }}" {{ old('instansi') == $item->nama_instansi ? 'selected' : '' }}>{{ $item->nama_instansi }}</option>
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
                                    <option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" >
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
                                        <option value="{{ $item->name }}" {{ old('role') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
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
