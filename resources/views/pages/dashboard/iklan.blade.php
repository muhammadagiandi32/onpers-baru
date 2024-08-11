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
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Upload Iklan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="newsForm" action="{{ route('iklan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control">
                                        <option value="kiri">Kiri</option>
                                        <option value="kanan">Kanan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="gambar" />
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <img id="previewImage" src="#" alt="Preview Image"
                                            style="display: none; max-width: 200px" />
                                        <button type="button" id="removeImage" style="display: none"
                                            class="btn btn-danger">
                                            Remove Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
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

            $("#newsForm").on("submit", function(e) {
                e.preventDefault(); // Mencegah form submit secara default

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
                        $("#newsForm")[0].reset();

                        // Reset custom file input label
                        $("#exampleInputFile").val(null);
                        $("#previewImage").hide();
                        $("#removeImage").hide();

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
