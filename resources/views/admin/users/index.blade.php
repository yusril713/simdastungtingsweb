@extends('layouts.admin')
@section('title')
    Manage Users
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Manage Users</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="d-flex justify-content-end">
                    <a href="{{ route('manage-users.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="table_data">
                        <thead>
                            <td>No</td>
                            <td>Email</td>
                            <td>Nama</td>
                            <td>Instansi</td>
                            <td>Jenis Kelamin</td>
                            <td>No Telp</td>
                            <td>Alamat</td>
                            <td>Role</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                @if ($item->roles[0]->name != 'Super Admin')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ isset($item->instansi->nama_instansi) ? $item->instansi->nama_instansi : ''}}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->roles[0]->name }}</td>
                                        <td>
                                            <a href="{{ route('manage-users.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="{{ route('manage-users.reset-password', [Crypt::encrypt($item->id)]) }}" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin mereset password user {{ $item->email }}')"><i class="fas fa-lock"></i> Reset Pass</a>
                                            <form class="d-inline" action="{{ route('manage-users.destroy', [Crypt::encrypt($item->id)]) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data tersebut?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
