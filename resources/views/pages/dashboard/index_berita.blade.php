@extends('templates.layouts')

@section('styles')
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}">

{{--
<!-- DataTables --> --}}
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('customs/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Berita</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboards') }}">Home</a></li>
                    <li class="breadcrumb-item active">Index Berita</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>action</th>

                                    {{-- <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>action</th>

                                    {{-- <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('scripts')
<script src="{{ asset('customs/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/dist/js/adminlte.min.js') }}"></script>

{{-- data tables js --}}
<script src="{{ asset('customs/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(document).ready(function() {
            $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get_berita') }}",
                    dataSrc: function(json) {
                        console.log(
                            json
                            ); // Ini akan menampilkan data yang diterima dari server di konsol browser
                        return json
                            .data; // Pastikan untuk mengembalikan data yang sesuai dengan struktur yang diharapkan oleh DataTables
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    // {data: 'email', name: 'email'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <a href="/berita/${row.id}/edit" class="edit btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id="${row.id}">Delete</a>
                        `;
                        }
                    },
                ]
            });
            $('#table1').on('click', '.delete', function() {
                var id = $(this).data('id');
                var url = "{{ route('news.destroy', ':id') }}".replace(':id', id);

                if (confirm("Are you sure you want to delete this news?")) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.success);
                            $('#table1').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            alert(response.responseJSON.error);
                        }
                    });
                }
            });
        });
</script>
@endsection