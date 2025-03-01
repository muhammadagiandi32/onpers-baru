@extends('templates.layouts')

@section('styles')
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Iklan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Iklan</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">List Iklan</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('iklan.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Tambah Iklan
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="iklanTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Gambar</th>
                        <th>URL</th>
                        <th>Kategori</th>
                        <th>Dibuat</th>
                        <th>Diperbarui</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($iklans as $iklan)
                    <tr>
                        <td>{{ $iklan->id }}</td>
                        <td>{{ $iklan->image_name }}</td>
                        <td><a href="{{ $iklan->image_url }}" target="_blank">Lihat Gambar</a></td>
                        <td>{{ $iklan->category_name }}</td>
                        <td>{{ $iklan->created_at }}</td>
                        <td>{{ $iklan->updated_at }}</td>
                        <!-- <td>
                            <a href="{{ route('iklan.edit', $iklan->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('iklan.destroy', $iklan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('customs/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#iklanTable').DataTable({
            responsive: true,
            autoWidth: false,
            order: [[0, 'desc']]
        });
    });
</script>
@endsection
