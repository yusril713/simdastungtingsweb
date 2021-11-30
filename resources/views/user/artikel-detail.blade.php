@extends('layouts.global')
@section('title')
    {{ $artikel->judul }}
@endsection
@section('content')
<section class="list-portfolio bg-white">
    <div class="container">
        <div class="modal-portfolio-detail">
        <div class="col-md-8">
            <div class="content">
                <div class="image">
                    <img src="{{ asset($artikel->gambar) }}" alt="Skillagogo" class="img-responsive">
                </div>
                <div class="box-title">
                    <h4>{{ $artikel->judul }}</h4>
                </div>
                <div class="box-body">
                    <a href="#">{{ $artikel->editor ? $artikel->editor : 'Anonim' }} - {{ $artikel->tanggal }}</a>
                    <p>Publisher : {{ $artikel->user->name }}</p>
                    {!! $artikel->konten !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <aside class="sidebar">
                <div class="title-sidebar">
                    Latest Post
                </div>
                @foreach ($latest as $item)
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="image">
                                <img src="{{ asset($item->gambar) }}" alt="Skillagogo" class="img-responsive">
                            </div>
                            <div class="box-title">
                                <h4>{{ $item->judul }}</h4>
                            </div>
                            <div class="box-body">
                                <a href="#">{{ $item->editor ? $item->editor : 'Anonim' }} - {{ $item->tanggal }}</a>
                                <p>Publisher : {{ $item->user->name }}</p>
                                <p>{{ strip_tags(substr($item->konten,0, 50)) }}... <a href="{{ route('artikel.detail', [$item->slug]) }}">Selengkapnya</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </aside>
        </div>
    </div>
    </div>
</section>
@endsection
