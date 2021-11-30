@extends('layouts.admin')
@section('title')
     Informasi Stunting
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Informasi Stunting</a></li>
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

                <hr>
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-md-11">
                        {!! $item->info !!}
                    </div>
                    <div class="col-md-1">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('manage-info.edit', [Crypt::encrypt($item->id)]) }}">Edit</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
