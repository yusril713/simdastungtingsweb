@extends('layouts.admin')
@section('title')
    Manage Carousel
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Manage Carousel</a></li>
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
                    <a href="{{ route('manage-carousel.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="table_data">
                        <thead>
                            <td>No</td>
                            <td>Img</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ asset($item->img_source) }}" alt="img" width="100" class="img-fluid"></td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('manage-carousel.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                        <form action="{{ route('manage-carousel.destroy', [Crypt::encrypt($item->id)]) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin ingin menghapus data tersebut?')">
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
