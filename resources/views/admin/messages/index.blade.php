@extends('layout')
@section('konten')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Messages</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Messages</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-content">          
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pesan</h4>
                        <a href="{{ route('message.create') }}">
                            <button class="btn btn-primary rounded-pill">
                                <i class="bi bi-chat-dots-fill"></i>
                                Tambah Pesan
                            </button>
                        </a>
                    </div>        
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pesan</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $index => $message)
                                    <tr> 
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $message->jenis_pesan }}</td>
                                        <td>{{ $message->pesan }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <form action="{{ route('message.send', $message->id) }}" method="POST" style="display:inline;" class="send-form">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                                                </form>
                                                <a href="{{ route('message.edit', $message->id) }}">
                                                    <button type="button" class="btn btn-link btn-simple-primary" data-original-title="Edit Message">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <form onsubmit="return confirm('Yakin Mau dihapus?')" action="{{ route('message.destroy', $message->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-simple-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>                                        
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.send-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formElement = this;

            Swal.fire({
                title: 'Kirim Pesan?',
                text: "Anda akan mengirim pesan ini.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    formElement.submit();
                }
            });
        });
    });
</script>
@endsection