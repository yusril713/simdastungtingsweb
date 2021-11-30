@extends('layouts.admin')
@section('title')
    Tambah
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-dokumen.index') }}">Aksi Integrasi</a></li>
<li class="breadcrumb-item"><a href="#">Tambah</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('manage-dokumen.update', [Crypt::encrypt($data->id)]) }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin menyimpan data tersebut?')">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Kode Dokumen</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ $data->kode }}">
                                @error('kode')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="jenis_integrasi" id="" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="ANALISIS SITUASI" {{ ($data->jenis_integrasi == 'ANALISIS SITUASI') ? 'selected' : '' }}>ANALISIS SITUASI</option>
                                    <option value="RENCANA KEGIATAN" {{ ($data->jenis_integrasi == 'RENCANA KEGIATAN') ? 'selected' : '' }}>RENCANA KEGIATAN</option>
                                    <option value="REMBUK STUNTING" {{ ($data->jenis_integrasi == 'REMBUK STUNTING') ? 'selected' : '' }}>REMBUK STUNTING</option>
                                    <option value="PERWALI/PERBUP PERAN DESA/KELURAHAN" {{ ($data->jenis_integrasi == 'PERWALI/PERBUP PERAN DESA/KELURAHAN') ? 'selected' : '' }}>PERWALI/PERBUP PERAN DESA/KELURAHAN</option>
                                    <option value="PEMBINAAN KADER PEMBANGUNAN MANUSIA" {{ ($data->jenis_integrasi == 'PEMBINAAN KADER PEMBANGUNAN MANUSIA') ? 'selected' : '' }}>PEMBINAAN KADER PEMBANGUNAN MANUSIA</option>
                                    <option value="SISTEM MANAJEMEN DATA" {{ ($data->jenis_integrasi == 'SISTEM MANAJEMEN DATA') ? 'selected' : '' }}>SISTEM MANAJEMEN DATA</option>
                                    <option value="PENGUKURAN DAN PUBLIKASI DATA STUNTING" {{ ($data->jenis_integrasi == 'PENGUKURAN DAN PUBLIKASI DATA STUNTING') ? 'selected' : '' }}>PENGUKURAN DAN PUBLIKASI DATA STUNTING</option>
                                    <option value="REVIEW KERJA TAHUNAN" {{ ($data->jenis_integrasi == 'REVIEW KERJA TAHUNAN') ? 'selected' : '' }}>REVIEW KERJA TAHUNAN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}">
                                @error('nama')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tahun</label>
                                @php
                                    $tahun = date('Y') - 20;
                                    $current = date('Y');
                                @endphp
                                <select name="tahun" id="" class="form-control @error('tahun') is-invalid @enderror">
                                    <option value="">Pilih Tahun</option>
                                    @for ($i = $current; $i >= $tahun; $i--)
                                        <option value="{{ $i }}" {{ $data->tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('tahun')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jenis File</label>
                                <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                    <option value="">Pilih jenis dokumen</option>
                                    <option value="pdf" {{ $data->jenis == 'pdf' ? 'selected' : '' }}>PDF</option>
                                    <option value="document" {{ $data->jenis == 'document' ? 'selected' : '' }}>Word Dokomen</option>
                                    <option value="excel" {{ $data->jenis == 'excel' ? 'selected' : '' }}>Excel</option>
                                </select>
                                @error('jenis')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="jenis_dokumen" value="Aksi Integrasi">

                            <div id="input_class"></div>
                            <div class="form-group">
                                <label for="">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">
                                @error('file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            SetClass();
            $('#jenis').on('change', function() {

                SetClass();
            })
        })

        function SetClass() {
            var jenis = $('#jenis').val();
            console.log($('#jenis').val())
            if (jenis == 'pdf') {
                $('#input_class').html('<input type="hidden" name="class" value="fas fa-file-pdf">')
            } else if (jenis == 'document'){
                $('#input_class').html('<input type="hidden" name="class" value="fas fa-file-word">')
            } else if (jenis == 'excel') {
                $('#input_class').html('<input type="hidden" name="class" value="fas fa-file-excel">')
            }
        }
    </script>
@endsection
