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
                <h1>Detail Chat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('chat.index') }}">Chat</a></li>
                    <li class="breadcrumb-item active">Detail Chat</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('chat.index') }}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Folders</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Inbox
                                    @if(isset($messages) && $messages->isNotEmpty())
                                    <span class="badge bg-primary float-right">{{ $messages->count() }}</span>
                                    @else
                                    <span class="badge bg-primary float-right">0</span>
                                    @endif

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Sent
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file-alt"></i> Drafts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-filter"></i> Junk
                                    <span class="badge bg-warning float-right">65</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-trash-alt"></i> Trash
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Message Details</h3>
                    </div>

                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            @if (isset($messages) && $messages->isNotEmpty())
                            @foreach ($messages as $message)
                            <h5>{{ $message->subject }}</h5>
                            @endforeach
                            @else
                            <p>Tidak ada pesan yang tersedia.</p>
                            @endif



                            @if (isset($messages) && $messages->isNotEmpty())
                            @foreach ($messages as $message)
                            <h6>From: {{ $message->sender_email }}</h6>
                            <h5>{{ $message->subject }}</h5>
                            @endforeach
                            @else
                            <p>Tidak ada pesan yang tersedia.</p>
                            @endif

                            @if (isset($messages) && $messages->isNotEmpty())
                            @foreach ($messages as $message)
                            <h6>From: {{ $message->sender_email }}</h6>
                            <h5>{{ $message->subject }}</h5>
                            <span class="mailbox-read-time float-right">{{ $message->created_at->format('d M Y H:i')
                                }}</span>
                            @endforeach
                            @else
                            <p>Tidak ada pesan yang tersedia.</p>
                            @endif

                        </div>

                        <div class="mailbox-read-message">
                            @if (isset($messages) && $messages->isNotEmpty())
                            @foreach ($messages as $message)
                            <h6>From: {{ $message->sender_email }}</h6>
                            <h5>{{ $message->subject }}</h5>
                            <p>{{ $message->body }}</p> <!-- Menampilkan body pesan -->
                            <span class="mailbox-read-time float-right">{{ $message->created_at->format('d M Y H:i')
                                }}</span>
                            @endforeach
                            @else
                            <p>Tidak ada pesan yang tersedia.</p>
                            @endif

                        </div>
                    </div>

                    <div class="card-footer bg-white">
                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                            @if (isset($messages) && $messages->isNotEmpty())
                            @foreach ($messages as $message)
                            <div class="message-item">
                                <h5>{{ $message->subject }}</h5>
                                <h6>From: {{ $message->sender_email }}
                                    <span class="mailbox-read-time float-right">{{ $message->created_at->format('d M Y
                                        H:i') }}</span>
                                </h6>
                                <p>{{ $message->body }}</p>

                                @if ($message->attachments->isNotEmpty())
                                <ul class="mailbox-attachments">
                                    @foreach ($message->attachments as $attachment)
                                    <li>
                                        <span class="mailbox-attachment-icon"><i class="far fa-file"></i></span>
                                        <div class="mailbox-attachment-info">
                                            <a href="{{ route('chat.download', $attachment->id) }}"
                                                class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{
                                                $attachment->name }}</a>
                                            <span class="mailbox-attachment-size clearfix mt-1">
                                                <span>{{ number_format($attachment->size / 1024, 2) }} KB</span>
                                                <a href="{{ route('chat.download', $attachment->id) }}"
                                                    class="btn btn-default btn-sm float-right"><i
                                                        class="fas fa-cloud-download-alt"></i></a>
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            @endforeach
                            @else
                            <p>Tidak ada pesan yang tersedia.</p>
                            @endif
                        </ul>
                    </div>


                    <div class="card-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                            <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                        </div>
                        <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
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

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            // DataTable options
        });
    });
</script>
@endsection