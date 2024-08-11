@extends('templates.layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tulis Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tulis Berita</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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
                            <h3 class="card-title">Input Berita</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="newsForm" action="{{ route('news.update', $news->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Method PUT untuk update data -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judulBerita">Judul Berita</label>
                                    <input type="text" class="form-control" id="judulBerita" name="judul_berita"
                                        placeholder="Masukkan judul berita" value="{{ $news->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control">
                                        <option>-</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $news->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="gambar">
                                            <label class="custom-file-label"
                                                for="exampleInputFile">{{ $news->image_name ?? 'Choose file' }}</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <img id="previewImage" src="{{ $news->image_url }}" alt="Preview Image"
                                            style="max-width: 200px;">
                                        <button type="button" id="removeImage" class="btn btn-danger">Remove Image</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Content</label>
                                    <textarea id="summernote" name="content">{{ $news->content }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="{{ asset('customs/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof $ !== 'undefined') {
                $("#summernote").summernote();
            } else {
                console.error("jQuery is not loaded");
            }

            $('#exampleInputFile').change(function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result).show();
                    $('#removeImage').show();
                };
                reader.readAsDataURL(this.files[0]);

                let fileName = this.files[0].name;
                $(this).next('.custom-file-label').html(fileName);
            });

            $('#removeImage').click(function() {
                $('#exampleInputFile').val(null);
                $('#previewImage').hide();
                $(this).hide();

                $('.custom-file-label').html('Choose file');
            });

            $('#newsForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('Berita berhasil diperbarui!');

                        // Reset Summernote jika diperlukan
                        $('#summernote').summernote('reset');

                        // Reset input file
                        $('#exampleInputFile').val(null);
                        $('#previewImage').hide();
                        $('#removeImage').hide();
                        $('.custom-file-label').html('Choose file');
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = 'Terjadi kesalahan:\n';
                        $.each(errors, function(key, value) {
                            errorMessage += value + '\n';
                        });
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
@endsection
