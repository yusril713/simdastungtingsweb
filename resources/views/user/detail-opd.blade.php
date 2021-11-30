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
                    <a href="{{ route('file-odp') }}">Kembali</a>
                    <div class="table-responsive">
                        <table  class="table table-striped" id="default_table">
                            <thead>
                                <th style="font-size: 12pt">NO</th>
                                <th style="font-size: 12pt">PROGRAM/KEGIATAN</th>
                                <th style="font-size: 12pt">INDIKATOR</th>
                                <th style="font-size: 12pt">BASELINE</th>
                                <th style="font-size: 12pt">TARGET KINERJA</th>
                                <th style="font-size: 12pt">LOKASI</th>
                                <th style="font-size: 12pt">ANGGARAN</th>
                                <th style="font-size: 12pt">SUMBER PENDANAAN</th>
                                <th style="font-size: 12pt">AKSI</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="font-size: 12pt">{{ $no++ }}</td>
                                        <td style="font-size: 12pt">{{ $item->program }}</td>
                                        <td style="font-size: 12pt">{{ $item->indikator }}</td>
                                        <td style="font-size: 12pt">{{ $item->baseline }}</td>
                                        <td style="font-size: 12pt">{{ $item->targer }}</td>
                                        <td style="font-size: 12pt">{{ $item->lokasi }}</td>
                                        <td style="font-size: 12pt">{{ $item->anggaran }}</td>
                                        <td style="font-size: 12pt">{{ $item->sumber_pendanaan }}</td>
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
