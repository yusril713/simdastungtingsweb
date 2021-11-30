@extends('layouts.admin')
@section('title')
    {{$data->nama}}
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-dokumen.index') }}">Manage Dokumen</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body">
                <div class="embed-responsive embed-responsive-1by1">
                    @if ($data->jenis == 'pdf')
                    <object class="embed-responsive-item" data="{{ asset($data->file) }}">
                    </object>
                    @else
                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset($data->file) }}' width='px' height='px' frameborder='0'>
                    </iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
