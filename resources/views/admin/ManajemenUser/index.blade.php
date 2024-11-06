@extends('layout')
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card-content">          
                    <div class="card-header">
                        <h4 class="card-title">Akun User</h4>
                        <a href="{{ route('ManajemenUser.tambah') }}">
                            <button class="btn btn-primary rounded-pill">
                                <i class="bi bi-person-plus-fill"></i>
                                Add User
                            </button>
                        </a>
                    </div>        
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No Handphone</th>
                                    <th>Alamat</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($users as $item)
                                    <tr> 
                                        <td>{{ $i }}</td>
                                        <td>
                                            @if($item->gambar)
                                                <img style="max-width:100px;max-height:100px" src="{{ asset('gambar/' . $item->gambar) }}" alt="Profile Picture">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->no_telepon }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('ManajemenUser.edit', $item->id) }}">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <form onsubmit="return confirm('Are you sure you want to delete this data?')"  action="{{ route('ManajemenUser.destroy', $item->id)}}" class="d-inline" method="GET">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="submit" class="btn btn-link btn-simple-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>                                        
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
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
        Swal.fire(
        {
            title: 'Success!',
            icon: "success",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection