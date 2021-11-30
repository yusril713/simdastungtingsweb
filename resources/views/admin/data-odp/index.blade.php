@extends('layouts.admin')
@section('title')
    Data OPD
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Data OPD</a></li>
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
                    <a href="{{ route('manage-data-opd.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="default_table">
                        <thead>
                            <td>No</td>
                            <td>Kategori</td>
                            <td>Program/Kegiatan</td>
                            <td>Indikator</td>
                            <td>Baseline</td>
                            <td>Target</td>
                            <td>Lokasi</td>
                            <td>Anggaran</td>
                            <td>Sumber Dana</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->program }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td>{{ $item->baseline }}</td>
                                    <td>{{ $item->targer }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->anggaran }}</td>
                                    <td>{{ $item->sumber_pendanaan }}</td>
                                    <td>
                                        <a href="{{ route('manage-data-opd.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                        <form action="{{ route('manage-data-opd.destroy', [Crypt::encrypt($item->id)]) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin ingin menghapus data tersebut?')">
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
