@extends('templates.layouts')

@section('styles')
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chat</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" {{-- src="{{ $user->profile_picture }}"
                                --}} alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        <h4 class="text-muted text-center">{{ $user->media }}</h4>
                        <h4 class="text-muted text-center">{{ $user->email }}</h4>
                        <!-- Ganti dengan kolom yang sesuai -->
                        <ul class="list-group list-group-unbordered mb-3">
                            <!-- Tambahkan informasi lain jika perlu -->
                        </ul>
                        {{-- {{dd()}} --}}
                        <a href="{{ route('chat.compose',['email'=>request()->route()->parameters['id']->email] ) }}"
                            class="btn btn-primary btn-block"><b>Send
                                Message</b></a>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>

                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>
                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">Malibu, California</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                            enim neque.</p>
                    </div>

                </div>

            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Messages</h3>
                    </div>
                    <div class="card-body">
                        <div class="direct-chat-messages">
                            <!-- Menampilkan pesan -->
                            @if (isset($messages) && $messages->isNotEmpty())
                            @foreach ($messages as $message)
                            {{-- <img class="direct-chat-img"
                                src="{{ $message->sender == $user->email? asset('customs/adminlte/dist/img/user1-128x128.jpg') : asset('customs/adminlte/dist/img/user2-160x160.jpg') }}"
                                alt="User"> {{$message->name}}
                            <div class="direct-chat-msg {{ $message->sender == $user->email?'right' : '' }}">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name float-left">{{ $message->message }}</span>
                                    <span class="direct-chat-timestamp float-right">{{
                                        $message->created_at->format('d-m-Y H:i') }}</span>
                                </div>
                            </div> --}}
                            <div class="direct-chat-msg {{ $message->sender == $user->email ? 'right' : '' }}">
                                <div class="direct-chat-info clearfix">
                                    <!-- Menampilkan "You" jika pengirim adalah user yang sedang login -->
                                    <span class="direct-chat-name float-left">
                                        {{ $message->sender == $user->email ? 'You' : $message->name }}
                                    </span>
                                    <span class="direct-chat-timestamp float-right">
                                        {{ $message->created_at->format('d-m-Y H:i') }}
                                    </span>
                                </div>
                                <div class="direct-chat-text">
                                    {{ $message->message }}
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="direct-chat-input">
                            <form action="{{ route('messages.store') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="hidden" name="sender" value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="to" value="{{ $to->email }}">
                                    <input type="text" name="message" placeholder="Type message..."
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="
            </div>



        </div>

    </div>
</section>
@endsection

@section('scripts')
<script src=" {{ asset('customs/adminlte/plugins/datatables/jquery.dataTables.min.js') }}">
                    </script>
                    <script
                        src="{{ asset('customs/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
                    </script>
                    <script
                        src="{{ asset('customs/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
                    </script>
                    <script
                        src="{{ asset('customs/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
                    </script>
                    <script
                        src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}">
                    </script>
                    <script
                        src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}">
                    </script>
                    <script src="{{ asset('customs/adminlte/plugins/jszip/jszip.min.js') }}"></script>
                    <script src="{{ asset('customs/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
                    <script src="{{ asset('customs/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
                    <script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}">
                    </script>
                    <script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}">
                    </script>
                    <script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}">
                    </script>

                    <script>
                        $(document).ready(function() {
        $('#table1').DataTable({
            // DataTable options
        });
    });
                    </script>
                    @endsection