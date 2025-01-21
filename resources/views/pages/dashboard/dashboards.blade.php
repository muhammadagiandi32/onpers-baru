@extends('templates.layouts')

@section('styles')
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}">
<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        border-radius: 10px 10px 0 0;
        font-size: 1.5rem;
        text-align: center;
    }

    .card-body {
        text-align: center;
        padding: 20px;
    }

    .card-icon {
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .card-number {
        font-size: 2rem;
        font-weight: bold;
    }

    .card-footer {
        background-color: #f4f6f9;
        border-radius: 0 0 10px 10px;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Menampilkan Berita -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card bg-info">
                    <div class="card-header">
                        <h3>Berita Terbaru</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="card-number">{{ $totalBerita }}</div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-light btn-block">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Menampilkan Acara -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card bg-success">
                    <div class="card-header">
                        <h3>Acara Terbaru</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="card-number">{{ $totalAcara }}</div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-light btn-block">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Menampilkan Rilis -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h3>Rilis Terbaru</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="card-number">{{ $totalRilis }}</div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-light btn-block">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
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

<script src="{{ asset('customs/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('customs/adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            // DataTable options
        });
    });
</script>
@endsection