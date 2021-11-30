@extends('layouts.global')
@section('title')
    Informasi Stunting
@endsection
@section('content')
<!-- START SCOPE SUB HEADER -->
<section class="sub-header parallax-apecsa"  style="background-color: #FFC000">
    <div class="bg-overlay-full"></div>
    <div class="container">
      <div class="col-md-12">
        <div class="title text-center">
          Informasi Stunting
        </div>
      </div>
    </div>
  </section>
<section class="list-portfolio bg-white">
    <div class="container">
        <div class="modal-portfolio-detail">
            <div class="col-md-8">
                {!! $data->info !!}
            </div>
            <div class="col-md-4">
                <aside class="sidebar">
                    <div class="title-sidebar">
                        Latest Post
                    </div>
                    @foreach ($artikel as $item)
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
