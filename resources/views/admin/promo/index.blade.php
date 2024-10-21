@extends('layout')
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Promo</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">PPPoE</li>
                        <li class="breadcrumb-item active" aria-current="page">Active Connection</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4 class="card-title">Data Profile</h4>
                <a href="{{ route('promo.tambah') }}">
                    <button class="btn btn-primary rounded-pill">
                        <i class="fa fa-plus"></i>
                        Add Profiles
                    </button>
                </a>
            </div>     
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Senna Kokop Jempol</td>
                        <td>Router 1</td>
                        <td>
                            <div class="form-button-action">
                                <a href="{{ route('promo.edit') }}">
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
</section>
@endsection