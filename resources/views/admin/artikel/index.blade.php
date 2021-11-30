@extends('layouts.admin')
@section('title')
    Manage Artikel
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Manage Artikel</a></li>
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
                    <a href="{{ route('manage-artikel.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <hr>
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('manage-artikel.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action=" {{ route('manage-artikel.destroy', [Crypt::encrypt($item->id)]) }} " method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                        <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset($item->gambar) }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <h4>{{ $item->judul }}</h4>
                            <a href="#">{{ $item->editor ? $item->editor : 'Anonim' }} - {{ $item->tanggal }}</a>
                            <p>Publisher : {{ $item->user->name }}</p>
                            <p>{{ strip_tags(substr($item->konten,0, 700)) }}... <a href="{{ route('manage-artikel.show', [$item->slug]) }}">Selengkapnya</a></p>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
