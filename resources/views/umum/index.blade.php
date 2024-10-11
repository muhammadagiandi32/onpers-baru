@extends('templates.layouts')

@section('styles')
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<!-- AdminLTE style -->
<link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Informasi Umum</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Umum</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Pimpinan Perusahaan Card -->
            <div class="col-lg-6">
                <div class="card border-primary mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user-tie"></i> Pimpinan Perusahaan
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Agus Mansur</h5>
                    </div>
                </div>
            </div>

            <!-- Redaksi Card -->
            <div class="col-lg-6">
                <div class="card border-info mb-4">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-user-edit"></i> Redaksi
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Munib Anshori</h5>
                    </div>
                </div>
            </div>

            <!-- Developer IT Card -->
            <div class="col-lg-6">
                <div class="card border-success mb-4">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-laptop-code"></i> Developer IT
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Muhammad Agiandi<br>
                            Firman Saputra
                        </p>
                    </div>
                </div>
            </div>

            <!-- Supporting Bisnis Card -->
            <div class="col-lg-6">
                <div class="card border-warning mb-4">
                    <div class="card-header bg-warning text-white">
                        <i class="fas fa-handshake"></i> Supporting Bisnis
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Muhammad Lukman Hakim</h5>
                    </div>
                </div>
            </div>

            <!-- Produk Bisnis Card -->
            <div class="col-lg-12">
                <div class="card border-dark mb-4">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-briefcase"></i> Produk Bisnis
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check"></i> Public relations (PR)</li>
                            <li><i class="fas fa-check"></i> Event Organizer (EO)</li>
                            <li><i class="fas fa-check"></i> Developer IT (Web dan Aplikasi)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Legalitas Perusahaan Card -->
            <div class="col-lg-12">
                <div class="card border-secondary mb-4">
                    <div class="card-header bg-secondary text-white">
                        <i class="fas fa-gavel"></i> Legalitas Perusahaan
                    </div>
                    <div class="card-body">
                        <p>PT. Barokah Onpers Sejahtera<br>
                            Menara 165 Lt.14 Unit E<br>
                            Jl. TB Simatupang No. Kav. 1 Cilandak Timur, Pasar Minggu<br>
                            Jakarta Selatan 12560</p>
                    </div>
                </div>
            </div>

            <!-- Kontak Card -->
            <div class="col-lg-6">
                <div class="card border-danger mb-4">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-phone-alt"></i> Kontak
                    </div>
                    <div class="card-body">
                        <p>0816 111 4151</p>
                    </div>
                </div>
            </div>

            <!-- Email Card -->
            <div class="col-lg-6">
                <div class="card border-primary mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-envelope"></i> Email
                    </div>
                    <div class="card-body">
                        <p>onpers.pusat@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- DataTables & Plugins -->
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

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            // Options for DataTables
        });
    });
</script>
@endsection