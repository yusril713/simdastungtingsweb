@extends('layouts.admin')
@section('title')
    Manage Kontak
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="#">Manage Kontak</a></li>
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
                <div class="table-responsive">
                    <table class="table table-striped" id="default_table">
                        <thead>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Facebook</td>
                            <td>Twitter</td>
                            <td>Instagram</td>
                            <td>Location</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->facebook }}</td>
                                    <td>{{ $item->twitter }}</td>
                                    <td>{{ $item->instagram }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>
                                        <a href="{{ route('manage-kontak.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
