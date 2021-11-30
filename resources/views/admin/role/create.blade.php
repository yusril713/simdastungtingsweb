@extends('layouts.admin')
@section('title')
    Tambah Roles
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Roles
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('manage-role.index') }}"> Roles</a></li>
            <li class="active">Tambah</li>
        </ol>
    </section>


    <section class="content">
        @if (session('status'))
            <script>
                Swal.fire(
                    'Messages',
                    'You clicked the button!',
                    'success'
                );
            </script>
        @endif
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Roles</h3>

                {{-- <div class="box-tools pull-right">
                    <a href="{{ route('manage-bencana.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i>&nbsp; Kembali</a>
                </div> --}}
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5 col-md-offset-3">
                        <form id="ff" action="{{ route('manage-role.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data"  onsubmit="return confirm('Yakin ingin menyimpan data tersebut?')">
                            @csrf
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="nama" class="col-sm-4 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama" class="col-sm-4 control-label">Guard Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('guard_name') is-invalid @enderror" name="guard_name" id="guard_name" value="{{ old('guard_name') }}">
                                        @error('guard_name')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-8 col-md-offset-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm bt_save"><i class="fa fa-save"></i> Simpan</button>
                                </div>

                                <div class="pull-left">
                                    <a href="{{ route('manage-role.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i>&nbsp; Kembali</a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>
@endsection

@section('script')
<script>
    // function previewImages() {

    //     var preview = document.querySelector('#images');

    //     if (this.files) {
    //         [].forEach.call(this.files, readAndPreview);
    //     }

    //     function readAndPreview(file) {

    //         // Make sure `file.name` matches our extensions criteria
    //         if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
    //             return alert(file.name + " is not an image");
    //         } // else...
            
    //         var reader = new FileReader();
            
    //         reader.addEventListener("load", function() {
    //             var image = new Image();
    //             image.height = 100;
    //             image.title  = file.name;
    //             image.src    = this.result;
    //             preview.appendChild(image);
    //         });
            
    //         reader.readAsDataURL(file);
            
    //         }

    //     }

    //     document.querySelector('#images').addEventListener("change", previewImages);
        

        $("#images").on('change', function() {
            //Get count of selected files
            var countFiles = $(this)[0].files.length;
            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#foto_view");
            image_holder.empty();
            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof(FileReader) != "undefined") {
                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) 
                {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": "100",
                        "height": "auto"
                    }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }
                } else {
                alert("This browser does not support FileReader.");
                }
            } else {
                alert("Pls select only images");
            }
        });

    // $('.input-images-1').imageUploader();
        
    // let $inputImages = $form.find('input[name^="images"]');
    // if (!$inputImages.length) {
    //     $inputImages = $form.find('input[name^="photos"]')
    // }
</script>

<script>
    
    $(document).ready(function() {
        
        $('#provinsi').change(function() {
            var prov = $(this).val();
            //console.log(prov);

            url = "{{ url('get-kab') }}" + "/" + prov;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#kabupaten').empty();
                    $('#kabupaten').append('<option selected>Pilih Kabupaten</option>');
                    $.each(data, function(key, value) {
                        $('#kabupaten').append('<option value="'+ value.id +'" {{ (old('kabupaten') == ('+ value.id +')) ? 'selected' : '' }}>'+ value.nama +'</option>');
                    });
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        });

        $('#kabupaten').change(function() {
            var kab = $(this).val();
            //console.log(kab);

            url = "{{ url('get-kec') }}" + "/" + kab;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#kecamatan').empty();
                    $('#kecamatan').append('<option selected>Pilih Kecamatan</option>');
                    $.each(data, function(key, value) {
                        $('#kecamatan').append('<option value="'+ value.id +'" {{ (old('kecamatan') == ('+ value.id +')) ? 'selected' : '' }}>'+ value.nama +'</option>');
                    });
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        });

        $('#kecamatan').change(function() {
            var kec = $(this).val();
            //console.log(kec);

            url = "{{ url('get-kel') }}" + "/" + kec;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#kelurahan').empty();
                    $('#kelurahan').append('<option selected>Pilih Desa</option>');
                    $.each(data, function(key, value) {
                        $('#kelurahan').append('<option value="'+ value.id +'" {{ (old('kelurahan') == ('+ value.id +')) ? 'selected' : '' }}>'+ value.nama +'</option>');
                    });
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        });

        $('.bt_save').click(function() {
            $('.alert-danger').fadeIn();
        });



        //$('.alert-danger').fadeOut(5000);
        setTimeout(function(){ $('.alert-danger').fadeOut(); }, 5000);

        $('.bt_clear').on('click', function() {
            $('#ff')[0].reset();
            $('.select2').select2().reset();
        });
    });
</script>
@endsection
