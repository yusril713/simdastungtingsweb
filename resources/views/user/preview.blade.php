@extends('layouts.global')
@section('title')
{{ $data->judul }}
@endsection
@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
                <div class="embed-responsive embed-responsive-16by9">
                    @if ($data->jenis == 'pdf')
                    <object class="embed-responsive-item" data="{{ asset($data->file) }}">
                    </object>
                    @else
                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset($data->file) }}'frameborder='0'>
                    </iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div><section
@endsection
