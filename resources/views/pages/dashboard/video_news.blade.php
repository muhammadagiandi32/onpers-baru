@extends('templates.layouts') @section('styles')
    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.css') }}" />
    @endsection @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Tulis Berita</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <form action="{{ route('iklan.video_news') }}" id="videoUpload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Upload file</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection @section('scripts')
    <script src="{{ asset('customs/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // const fileInput = document.getElementById("exampleInputFile");
            // const categorySelect = document.getElementById("category");

            // categorySelect.addEventListener("change", function() {
            //     const category = categorySelect.value;
            //     fileInput.name = category;
            // });

            $("#exampleInputFile").change(function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#previewImage").attr("src", e.target.result).show();
                    $("#removeImage").show();
                };
                reader.readAsDataURL(this.files[0]);

                // Update the label with the file name
                let fileName = this.files[0].name;
                $(this).next(".custom-file-label").html(fileName);
            });

            $("#removeImage").click(function() {
                $("#exampleInputFile").val(null);
                $("#previewImage").hide();
                $(this).hide();

                // Reset custom file input label
                $(".custom-file-label").html("Choose file");
            });


            $("#videoUpload").on("submit", function(e) {
                e.preventDefault(); // Mencegah form submit secara default
                // console.log('ini video');
                // return;
                let formData = new FormData(this);

                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Berhasil
                        alert("Berita berhasil ditambahkan!");

                        // Reset form
                        $("#videoUpload")[0].reset();

                        // // Reset custom file input label
                        // $("#exampleInputFile").val(null);
                        // $("#previewImage").hide();
                        // $("#removeImage").hide();

                        // Reset custom file input label
                        $(".custom-file-label").html("Choose file");
                    },
                    error: function(xhr) {
                        // Gagal
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = "Terjadi kesalahan:\n";
                        $.each(errors, function(key, value) {
                            errorMessage += value + "\n";
                        });
                        alert(errorMessage);
                    },
                });
            });
        });
    </script>
@endsection
