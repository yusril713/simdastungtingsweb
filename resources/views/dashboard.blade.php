@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('additional-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{ $user_count }}</h3>

                    <p>Pengguna</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                  <a href="{{ route('manage-users.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ $artikel_count }}<sup style="font-size: 20px"></sup></h3>

                    <p>Artikel</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-newspaper"></i>
                  </div>
                  <a href="{{ route('manage-artikel.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ $galeri_count }}</h3>

                    <p>Galeri</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-th"></i>
                  </div>
                  <a href="{{ route('manage-galeri.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ $dokumen_count }}</h3>

                    <p>Dokumen</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-file"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
    </div>
</div>
@endsection
