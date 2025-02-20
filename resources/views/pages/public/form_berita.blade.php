<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>onPers | Mulai Pemberitaan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="onPers | Mulai Pemberitaan" name="keywords">
    <meta content="onPers | Mulai Pemberitaan" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/img/logo/logo-onpers.png') }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/summernote/summernote.min.css') }}">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" rel="stylesheet">
    <style>

        /* start css untuk nav dan header */
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        .header {
            padding: 10px 0;
            background-color: #000;
            color: white;
            border-bottom: 1px solid #222;
        }

        .navbar-custom {
            background-color: #d32f2f;
            padding: 0.5rem 0;
        }

        .navbar-custom .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        .navbar-custom .nav-link:hover {
            color: #ffcccc;
        }

        .navbar-custom .nav-link.active {
            color: white;
            border-bottom: 2px solid #ffcccc;
        }

        .navbar-toggler {
            border: none;
            outline: none;
            padding: 5px 10px;
        }

        .navbar-toggler-icon {
            font-size: 24px;
            color: white;
        }

        .b-search {
            max-width: 300px;
            display: none;
        }

        @media (min-width: 768px) {
            .navbar-toggler {
                display: none; /* Sembunyikan tombol burger di layar besar */
            }

            .b-search {
                display: flex; /* Tampilkan search bar di layar besar */
            }
        }
        /* end css untuk nav dan header */


        .btn-success {
            background-color: #d32f2f;
            border: none;
        }

        .btn-success:hover {
            background-color: #a52828;
        }

        .footer {
            background-color: #000;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
   <!-- Header Start -->
   <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand text-white font-weight-bold d-flex align-items-center">
                <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo" style="height: 40px; margin-right: 8px;"> onPers
            </a>
            <form class="b-search d-none d-md-flex">
                <input type="text" class="form-control mr-2" placeholder="Search">
                <button class="btn btn-light"><i class="fa fa-search"></i></button>
            </form>
            <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
        </div>
    </header>

    <nav class="navbar navbar-expand-md navbar-custom">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('dashboards') }}" class="nav-link">Dashboard</a>
                        </li>
                    @endif
                </ul>
                @if (Auth::check())
                    <!-- <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('add-news') }}" class="nav-link"><i class="fa fa-upload"></i> Upload Berita</a>
                        </li>
                    </ul> -->
                @endif
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Main Content -->
    <section class="content py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Input Berita</h3>
                        </div>
                        <form id="newsForm" action="{{ route('news.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judulBerita" class="font-weight-bold">Judul Berita</label>
                                    <input type="text" class="form-control" id="judulBerita" name="judul_berita"
                                        placeholder="Masukkan judul berita">
                                </div>
                                <div class="form-group">
                                    <label for="category" class="font-weight-bold">Kategori</label>
                                    <select id="category" name="category" class="form-control">
                                        <option>- Pilih Kategori -</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="gambar">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <img id="previewImage" src="#" alt="Preview Image"
                                            style="display: none; max-width: 200px;">
                                        <button type="button" id="removeImage" style="display: none;"
                                            class="btn btn-danger">Remove Image</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="summernote" class="font-weight-bold">Konten Berita</label>
                                    <textarea id="summernote" name="content" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content End -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0"> Copyright &copy; <strong style="color:red">onPers</strong>. All Rights Reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
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
                };
                reader.readAsDataURL(this.files[0]);
            });
            $('#exampleInputFile').change(function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result).show();
                    $('#removeImage').show();
                };
                reader.readAsDataURL(this.files[0]);
                // Update the label with the file name
                let fileName = this.files[0].name;
                $(this).next('.custom-file-label').html(fileName);
            });
            $('#removeImage').click(function() {
                $('#exampleInputFile').val(null);
                $('#previewImage').hide();
                $(this).hide();
                // Reset custom file input label
                $('.custom-file-label').html('Choose file');
            });
            $('#newsForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah form submit secara default
                let formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Berhasil
                        alert('Berita berhasil ditambahkan!');
                        // Reset form
                        $('#newsForm')[0].reset();
                        // Reset Summernote
                        $('#summernote').summernote('reset');
                        // Reset custom file input label
                        $('#exampleInputFile').val(null);
                        $('#previewImage').hide();
                        $(this).hide();
                        // Reset custom file input label
                        $('.custom-file-label').html('Choose file');
                    },
                    error: function(xhr) {
                        // Gagal
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

</body>

</html>
