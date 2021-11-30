@extends('layouts.admin')
@section('title')
    {{ $data->judul }}
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-artikel.index') }}">Manage Artikel</a></li>
<li class="breadcrumb-item"><a href="#">{{ $data->judul }}</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ asset($data->gambar) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12">
                        <h4>{{ $data->judul }}</h4>
                        <a href="#">{{ $data->editor ? $data->editor : 'Anonim' }} - {{ $data->tanggal }}</a>
                        <p>Publisher : {{ $data->user->name }}</p>
                        <p class="text-justify">{!! $data->konten !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
