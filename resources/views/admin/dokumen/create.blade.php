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
                        <form action="{{ route('manage-dokumen.store') }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin menyimpan data tersebut?')">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode Dokumen</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode') }}">
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
                                    <option value="ANALISIS SITUASI">ANALISIS SITUASI</option>
                                    <option value="RENCANA KEGIATAN">RENCANA KEGIATAN</option>
                                    <option value="REMBUK STUNTING">REMBUK STUNTING</option>
                                    <option value="PERWALI/PERBUP PERAN DESA/KELURAHAN">PERWALI/PERBUP PERAN DESA/KELURAHAN</option>
                                    <option value="PEMBINAAN KADER PEMBANGUNAN MANUSIA">PEMBINAAN KADER PEMBANGUNAN MANUSIA</option>
                                    <option value="SISTEM MANAJEMEN DATA">SISTEM MANAJEMEN DATA</option>
                                    <option value="PENGUKURAN DAN PUBLIKASI DATA STUNTING">PENGUKURAN DAN PUBLIKASI DATA STUNTING</option>
                                    <option value="REVIEW KERJA TAHUNAN">REVIEW KERJA TAHUNAN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
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
                                        <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
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
                                    <option value="">Pilih jenis file</option>
                                    <option value="pdf" {{ old('jenis') == 'pdf' ? 'selected' : '' }}>PDF</option>
                                    <option value="document" {{ old('jenis') == 'excel' ? 'selected' : '' }}>Word Dokomen</option>
                                    <option value="excel" {{ old('jenis') == 'excel' ? 'selected' : '' }}>Excel</option>
                                </select>
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
