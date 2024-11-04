@extends('layout')
@section('konten')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Akun User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen User</li>
                        <li class="breadcrumb-item active" aria-current="page">Update User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update User</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('ManajemenUser.updateUser', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Username</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                id="name" name="name" value="{{ $data->name }}">
                                            <div class="form-control-icon" name="name">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email">Email</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                 id="email" name="email" value="{{$data->email}}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password">Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control"
                                                placeholder="Password..." id="password" name="password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="alamat">Alamat</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                placeholder="alamat..." id="alamat" name="alamat" value="{{ $data->alamat }}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-geo-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password">No Telephone</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                placeholder="No Telepon User..." id="no_telepon" name="no_telepon" value="{{ $data->no_telepon }}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="gambar" class="form-group">Upload Foto</label>
                                            @if($data->gambar)
                                                <div class="mb-2">
                                                    <img style="max-width:100px;max-height:100px" src="{{ asset('gambar/' . $data->gambar) }}" alt="Profile Picture">
                                                </div>
                                            @else
                                                <p>No Image Available</p>
                                            @endif
                                            <input class="form-control" type="file" id="gambar" name="gambar" value="{{ $data->gambar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <fieldset class="form-group">
                                                    <select class="form-select" id="role" name="role">
                                                        <option value="Admin" {{ old('role', Session::get('role')) == 'admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="User" {{ old('role', Session::get('role')) == 'user' ? 'selected' : '' }}>User</option>
                                                    </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-start">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('admin.ManajemenUser.index') }}" class="btn btn-danger me-1 mb-1">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection