@extends('layouts.global')
@section('title')
    {{ isset($keyword) ? $keyword : 'Artikel' }}
@endsection
@section('content')
<section class="development-categories bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{ route('artikel.search') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text"  class="form-control" placeholder="Search..." name="keyword">
                        <span class="input-group-btn">
                              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                              </button>
                            </span>
                      </div>
                </form>
                <div class="text-center">
                    {{ isset($keyword) ? 'Search results ' . $keyword . '...' : '' }}
                </div>
            </div>
        </div>
            <hr><div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                @foreach ($data as $item)
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="{{ asset($item->gambar) }}" alt=""  class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <a href="{{ route('artikel.detail', [$item->slug]) }}"><h4>{{ $item->judul }}</h4></a>
                        <div class="box-body">
                            <a href="{{ route('artikel.detail', [$item->slug]) }}">{{ $item->editor ? $item->editor : 'Anonim' }} - {{ $item->tanggal }}</a>
                            <p>Publisher : {{ $item->user->name }}</p>
                            <p>{{ strip_tags(substr($item->konten,0, 300)) }}... <a href="{{ route('artikel.detail', [$item->slug]) }}">Selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                <div class="row">
                    <div class="box-footer">
                        <div class="text-right">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</section>
@endsection
