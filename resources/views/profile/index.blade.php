@extends('templates.layouts')

@section('styles')
<link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/adminlte/dist/css/adminlte.min.css') }}">
<style>
    .direct-chat-text.sender {
        background-color: #8d9aff;
        /* warna hijau muda */
        color: #000;
    }

    .direct-chat-text.receiver {
        background-color: #004145;
        /* warna kuning muda */
        color: #ffffff;
    }

    .direct-chat-name.sender {
        color: #2eaacc;
        /* warna hijau tua */
    }

    .direct-chat-name.receiver {
        color: #F1C40F;
        /* warna kuning tua */
    }
</style>
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
                        <a href="{{ route('chat.compose', ['email' => $user ? $user->email : 'default@example.com'] ) }}"
                            class="btn btn-primary btn-block">
                            <b>Kirim Pesan</b>
                        </a>
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
                                <div
                                    class="direct-chat-text {{ $message->sender == $user->email ? 'sender' : 'receiver' }}">
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
                                    @if(isset($to))
                                    <input type="hidden" name="to" value="{{ $to->email }}">
                                    @else
                                    <p>User tidak ditemukan.</p>
                                    @endif

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
            </div>



        </div>

    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('customs/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('customs/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('customs/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('customs/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}">
</script>
<script src="{{ asset('customs/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}">
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
<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    $(document).ready(function() {
    var chatMessages = $('.direct-chat-messages');
    chatMessages.scrollTop(chatMessages[0].scrollHeight);

    $('form').submit(function(event) {
        event.preventDefault(); // prevent page reload
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: "{{ route('messages.store') }}",
            data: formData,
            success: function(data) {
                // append the new message to the chat log
                // console.log(data)
                // return
                var messageHTML = '<div class="direct-chat-msg ' + (data.sender == '{{ $user->email }}' ? 'right' : '') + '">' +
                    '<div class="direct-chat-info clearfix">' +
                    '<span class="direct-chat-name float-left">' +
                        (data.sender == '{{ $user->email }}' ? 'You' : data.name) +
                    '</span>' +
                    '<span class="direct-chat-timestamp float-right">' + moment().format('D-M-YYYY H:mm') + '</span>' +
                    '</div>' +
                    '<div class="direct-chat-text ' + (data.sender == '{{ $user->email }}' ? 'sender' : 'receiver') + '">' +
                        data.message +
                    '</div>' +
                    '</div>';
                $('.direct-chat-messages').append(messageHTML);

                  // Scroll ke bagian paling bawah
    var chatMessages = $('.direct-chat-messages');
    chatMessages.scrollTop(chatMessages[0].scrollHeight);
                // clear the input field
                $('input[name="message"]').val('');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});
</script>
@endsection
