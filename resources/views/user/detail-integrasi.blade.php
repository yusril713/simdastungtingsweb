@extends('layouts.global')
@section('title')
    {{ $title }}
@endsection
@section('content')
<section class="development-categories bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>{{ $title }}</h3>
                </div>
                <hr>
                <div class="row">
                    <a href="{{ route('aksi-integrasi') }}">Kembali</a>
                    <div class="table-responsive">
                        <table  class="table table-striped" id="default_table">
                            <thead>
                                <th style="font-size: 12pt">NO</th>
                                <th style="font-size: 12pt">TAHUN</th>
                                <th style="font-size: 12pt">KODE</th>
                                <th style="font-size: 12pt">TITLE</th>
                                <th style="font-size: 12pt">AKSI</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="font-size: 12pt">{{ $no++ }}</td>
                                        <td style="font-size: 12pt">{{ $item->tahun }}</td>
                                        <td style="font-size: 12pt">{{ $item->kode }}</td>
                                        <td style="font-size: 12pt">{{ $item->nama }}</td>
                                        <td style="font-size: 12pt"><a href="{{ asset($item->file) }}" target="_blank" class="btn btn-primary btn-sm"><li class="fas fa-download"></li></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
