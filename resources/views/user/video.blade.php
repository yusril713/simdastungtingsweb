@extends('layouts.global')
@section('title')
    Video
@endsection
@section('content')
<section class="content" style="padding-top: 20px">
    <div class="container">
    <div class="col-12">
        <div class="box">
            <div class="box-title-desc">
                <div class="title color-black bdr-btm-gray">
                  <span class="bg-section">Our Videos</span>
                </div>
              </div>
            <div class="box-body">
                <div class="row">
                    @foreach ($video as $item)
                    <div class="col-sm-4">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $item->konten }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h4>{{ $item->judul }}</h4>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="box-footer">
                <div class="d-flex justify-content-end">
                    {{ $video->links() }}
                </div>
            </div>
        </div>
    </div></div>
</section>
@endsection
