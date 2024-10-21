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
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Raven</td>
                                    <td>Raven@gmail.com</td>
                                    <td>raven123</td>
                                    <td>User</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('ManajemenUser.edit') }}">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection