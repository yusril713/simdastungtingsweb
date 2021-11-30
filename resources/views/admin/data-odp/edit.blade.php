@extends('layouts.admin')
@section('title')
    Tambah
@endsection
@section('additional-breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-data-opd.index') }}">Aksi Integrasi</a></li>
<li class="breadcrumb-item"><a href="#">Tambah</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form action="{{ route('manage-data-opd.update', [Crypt::encrypt($opd->id)]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="jenis" id="" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="Badan Perencanaan, Penelitian dan Pengembangan Daerah" {{ ($opd->jenis == 'Badan Perencanaan, Penelitian dan Pengembangan Daerah' ? 'selected' : '') }}>Badan Perencanaan, Penelitian dan Pengembangan Daerah</option>
                                    <option value="Dinas Kesehatan, Pengendalian Penduduk dan Keluarga Berencana Daerah" {{ ($opd->jenis == 'Dinas Kesehatan, Pengendalian Penduduk dan Keluarga Berencana Daerah' ? 'selected' : '') }}>Dinas Kesehatan, Pengendalian Penduduk dan Keluarga Berencana Daerah</option>
                                    <option value="Dinas Pertanian dan Ketahanan Pangan" {{ ($opd->jenis == 'Dinas Pertanian dan Ketahanan Pangan' ? 'selected' : '') }}>Dinas Pertanian dan Ketahanan Pangan</option>
                                    <option value="Dinas Perikanan Daerah" {{ ($opd->jenis == 'Dinas Perikanan Daerah' ? 'selected' : '') }}>Dinas Perikanan Daerah</option>
                                    <option value="Dinas Pekerjaan Umum dan Penataan Ruang Daerah" {{ ($opd->jenis == 'Dinas Pekerjaan Umum dan Penataan Ruang Daerah' ? 'selected' : '') }}>Dinas Pekerjaan Umum dan Penataan Ruang Daerah</option>
                                    <option value="Dinas Pendidikan Daerah" {{ ($opd->jenis == 'Dinas Pendidikan Daerah' ? 'selected' : '') }}>Dinas Pendidikan Daerah</option>
                                    <option value="Dinas Pemberdayaan Masyarakat, Desa, Pemberdayaan Perempuan dan Perlindungan Anak" {{ ($opd->jenis == 'Dinas Pemberdayaan Masyarakat, Desa, Pemberdayaan Perempuan dan Perlindungan Anak' ? 'selected' : '') }}>Dinas Pemberdayaan Masyarakat, Desa, Pemberdayaan Perempuan dan Perlindungan Anak</option>
                                    <option value="Dinas Sosial Daerah" {{ ($opd->jenis == 'Dinas Sosial Daerah' ? 'selected' : '') }}>Dinas Sosial Daerah</option>
                                    <option value="Dinas Kependudukan dan Catatan Sipil Daerah" {{ ($opd->jenis == 'Dinas Kependudukan dan Catatan Sipil Daerah' ? 'selected' : '') }}>Dinas Kependudukan dan Catatan Sipil Daerah</option>
                                    <option value="Dinas Komunikasi dan Informasi Daerah" {{ ($opd->jenis == 'Dinas Komunikasi dan Informasi Daerah' ? 'selected' : '') }}>Dinas Komunikasi dan Informasi Daerah</option>
                                    <option value="Dinas Perdagangan dan Perindustrian" {{ ($opd->jenis == 'Dinas Perdagangan dan Perindustrian' ? 'selected' : '') }}>Dinas Perdagangan dan Perindustrian</option>
                                    <option value="Kementerian Agama Kabupaten Morowali" {{ ($opd->jenis == 'Kementerian Agama Kabupaten Morowali' ? 'selected' : '') }}>Kementerian Agama Kabupaten Morowali</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Program</label>
                                <input type="text" class="form-control" name="program" value="{{ $opd->program }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Indikator</label>
                                <input type="text" class="form-control" name="indikator" value="{{ $opd->indikator }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Baseline</label>
                                <input type="text" class="form-control" name="baseline" value="{{ $opd->baseline }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Target Kinerja</label>
                                <input type="text" class="form-control" name="target" value="{{ $opd->targer }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" value="{{ $opd->lokasi }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Anggaran</label>
                                <input type="text" class="form-control" name="anggaran" value="{{ $opd->anggaran }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Sumber Pendanaan</label>
                                <input type="text" class="form-control" name="sumber_pendanaan" value="{{ $opd->sumber_pendanaan }}" required>
                            </div>

                            <div class="form-group">
                                <label for="">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">
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
