@extends('layouts.global')
@section('title')
    {{ $title }} {{ isset($keyword) ? '-' . $keyword : '' }}
@endsection
@section('content')
<section class="development-categories bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="table-responsive">
                        <table  class="table table-striped" id="default_table">
                            <thead>
                                <th colspan="2" style="font-size: 14pt" class="text-center">AKSI INTEGRASI</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td width="10%" class="align-middle" style="font-size: 14pt">{{ $no++ }}</td>
                                        <td width="90%" style="font-size: 14pt">
                                            <form action="{{ route('jenis-integrasi') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="jenis" value="{{ $item }}" >
                                                <button type="submit" class="btn btn-link-primary" style="font-size: 14pt">{{ $item }}</button>
                                            </form>
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
</section>
@endsection
