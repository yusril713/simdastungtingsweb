@extends('layouts.admin')
@section('title')
    Aksi Integrasi
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Aksi Integrasi</a></li>
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
                    <a href="{{ route('manage-dokumen.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="default_table">
                        <thead>
                            <td>No</td>
                            <td>Kategori</td>
                            <td>Kode</td>
                            <td>Title</td>
                            <td>Tahun</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->jenis_integrasi }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>
                                        <a href="{{ route('manage-dokumen.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="{{ route('manage-dokumen.show', [Crypt::encrypt($item->id)]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                                        <form action="{{ route('manage-dokumen.destroy', [Crypt::encrypt($item->id)]) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin ingin menghapus data tersebut?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
