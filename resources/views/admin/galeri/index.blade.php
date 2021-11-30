@extends('layouts.admin')
@section('title')
    Manage Galeri
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Manage Galeri</a></li>
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
                    <a href="{{ route('manage-galeri.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <td>No</td>
                            <td>Title</td>
                            <td>Konten</td>
                            <td>Diupload oleh</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        @if ($item->jenis == 'gambar')
                                            <img src="{{ asset($item->konten) }}" alt="tidak ada konten" width="300" class="img-fluid">
                                        @else
                                        <iframe width="300" src="https://www.youtube.com/embed/{{ $item->konten     }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @endif
                                    </td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <a href="{{ route('manage-galeri.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('manage-galeri.destroy', [Crypt::encrypt($item->id)]) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data tersebut?')">
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
