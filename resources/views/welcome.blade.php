@extends('layouts.global')
@section('title')
    Beranda
@endsection
@section('content')
<!-- START SCOPE CAROUSEL SLIDER -->
<div class="slider-apecsa">
    <div class="tp-banner-container">
      <div class="tp-banner">
        <ul>
        @php
            $counter = 1;
        @endphp
          @foreach ($carousel as $item)
          <li
            data-transition="slotzoom-horizontal"
            data-slotamount="1"
            data-masterspeed="1000"
            data-thumb="{{ asset($item->img_source) }}"
            data-saveperformance="off"
            data-title="We are Awsome">
            <img
                src="{{ asset($item->img_source) }}"
                alt=""
                data-bgposition="center top"
                data-bgfit="cover"
                data-bgrepeat="no-repeat">
            </li>
          @endforeach
        </ul>
        <div class="tp-bannertimer"></div>
      </div>
    </div>
  </div>
  <section class="development-categories bg-gray">
    <div class="container">
      <div class="col-md-12">
        <div class="box-title-desc">
          <div class="title color-black bdr-btm-gray">
            <span class="bg-section">Our Videos</span>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="row">
          <div class="box-categories">
            <div class="col-md-12">
              <div class="list-categories">
                <div class="title">
                  {{ $video->judul }}
                </div>
                <div class="description">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->konten }}" title="{{ $video->judul }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="footer text-right">
                    <a href="{{ route('video') }}">More videos...</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END SCOPE DEVELOPMENT CATEGORIES -->

  <!-- START SCOPE BUSSINESS PROCESS -->
  <section class="bussiness-process bg-red-pink"  style="background-color: #FFC000">
    <div class="container">
      <div class="col-md-12">

      </div>
    </div>
  </section>
  <!-- END SCOPE BUSSINESS PROCESS -->

  <section class="list-portfolio bg-white">
    <div class="container">
        <div class="col-md-12">
            <div class="box-title-desc">
              <div class="title color-black bdr-btm-gray">
                <span class="bg-section">Our Articles</span>
              </div>
            </div>
          </div>
          <div class="row">
        @foreach ($artikel as $item)
        <div class="col-md-4">
              <div class="box-image">
                <img src="{{ asset($item->gambar) }}" alt="Portfolio PT. Apecsa Optima Solusi" class="img-responsive">
              </div>
              <div class="box-title">
                  <a href="{{ route('artikel.detail', [$item->slug]) }}">{{ $item->judul }}</a>
              </div>
              <div class="box-body">
                <a href="{{ route('artikel.detail', [$item->slug]) }}">{{ $item->editor ? $item->editor : 'Anonim' }} - {{ $item->tanggal }}</a>
                <p>Publisher : {{ $item->user->name }}</p>
                <p>{{ strip_tags(substr($item->konten,0, 50)) }}... <a href="{{ route('artikel.detail', [$item->slug]) }}">Selengkapnya</a></p>
              </div>


          </div>
        @endforeach
    </div>
    <div class="row">
        <div class="box-footer">
            <div class="text-right">
              <a href="{{ route('artikel') }}">More articles...</a>
            </div>
        </div>
    </div>
    </div>
  </section>
@endsection
