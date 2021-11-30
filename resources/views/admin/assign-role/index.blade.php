@extends('layouts.admin')
@section('title')
    Data Assign Role
@endsection

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Assign Role
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Index</li>
            <li class="active">Data Assign Role</li>
        </ol>
    </section>


    <section class="content">
        @if (session('status'))
            <script>
                Swal.fire(
                    'Messages',
                    'Data successfully created...',
                    'success'
                );
            </script>
        @endif
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Data Assign Role</h3>

                {{-- <div class="box-tools pull-right">
                    <a href="{{ route('manage-role.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                </div> --}}
            </div>
            <div class="box-body table-responsive">
                <table id="tb" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <select name="role" id="role" data-user_id="{{ $item->id }}" class="form-control">
                                        @foreach ($role as $item_role)
                                            <option  value="{{ $item_role->name }}" {{ (isset($item->roles[0]->name) ? ($item_role->name == $item->roles[0]->name) ? 'selected' : '' : '')}}>{{ $item_role->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
@section('script')
<script>
    $(document).on('change', '#role', function() {
        console.log($(this).val());
        var url = "{{ route('assign-role.store') }}";
        console.log(url);
        var id = $(this).data('user_id');
        $.ajax({
            url: url,
            method:"POST",
            data:{
                id: id,
                role: $(this).val(),
                _token: "{{ csrf_token() }}"
            },
            success:function(data)
            {
                alert(data);
            }, error: function(xhr) {
                console.log(xhr);
            }
        });
    })
</script>
@endsection