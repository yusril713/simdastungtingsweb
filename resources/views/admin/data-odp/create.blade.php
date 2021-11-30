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
                        <form action="{{ route('manage-data-opd.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="jenis" id="" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="Badan Perencanaan, Penelitian dan Pengembangan Daerah">Badan Perencanaan, Penelitian dan Pengembangan Daerah</option>
                                    <option value="Dinas Kesehatan, Pengendalian Penduduk dan Keluarga Berencana Daerah">Dinas Kesehatan, Pengendalian Penduduk dan Keluarga Berencana Daerah</option>
                                    <option value="Dinas Pertanian dan Ketahanan Pangan">Dinas Pertanian dan Ketahanan Pangan</option>
                                    <option value="Dinas Perikanan Daerah">Dinas Perikanan Daerah</option>
                                    <option value="Dinas Pekerjaan Umum dan Penataan Ruang Daerah">Dinas Pekerjaan Umum dan Penataan Ruang Daerah</option>
                                    <option value="Dinas Pendidikan Daerah">Dinas Pendidikan Daerah</option>
                                    <option value="Dinas Pemberdayaan Masyarakat, Desa, Pemberdayaan Perempuan dan Perlindungan Anak">Dinas Pemberdayaan Masyarakat, Desa, Pemberdayaan Perempuan dan Perlindungan Anak</option>
                                    <option value="Dinas Sosial Daerah">Dinas Sosial Daerah</option>
                                    <option value="Dinas Kependudukan dan Catatan Sipil Daerah">Dinas Kependudukan dan Catatan Sipil Daerah</option>
                                    <option value="Dinas Komunikasi dan Informasi Daerah">Dinas Komunikasi dan Informasi Daerah</option>
                                    <option value="Dinas Perdagangan dan Perindustrian">Dinas Perdagangan dan Perindustrian</option>
                                    <option value="Kementerian Agama Kabupaten Morowali">Kementerian Agama Kabupaten Morowali</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Program</label>
                                <input type="text" class="form-control" name="program" required>
                            </div>
                            <div class="form-group">
                                <label for="">Indikator</label>
                                <input type="text" class="form-control" name="indikator" required>
                            </div>
                            <div class="form-group">
                                <label for="">Baseline</label>
                                <input type="text" class="form-control" name="baseline" required>
                            </div>
                            <div class="form-group">
                                <label for="">Target Kinerja</label>
                                <input type="text" class="form-control" name="target" required>
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" required>
                            </div>
                            <div class="form-group">
                                <label for="">Anggaran</label>
                                <input type="text" class="form-control" name="anggaran" required>
                            </div>
                            <div class="form-group">
                                <label for="">Sumber Pendanaan</label>
                                <input type="text" class="form-control" name="sumber_pendanaan" required>
                            </div>
                            <div class="form-group">
                                <label for="">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" required>
                                @error('file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">Simpan</button>
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
