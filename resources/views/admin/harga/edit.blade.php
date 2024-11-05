@extends('layout')
@section('konten')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Harga</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Harga</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Harga</li>
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
                    <h4 class="card-title">Edit Harga</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('harga.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="gambar_promosi" class="form-label">Upload Foto</label>
                                                <input class="form-control" type="file" id="gambar_promosi" name="gambar_promosi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" id="harga" class="form-control"
                                            placeholder="Last Name" name="harga">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" id="deskripsi" class="form-control"
                                            placeholder="Last Name" name="deskripsi">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-start">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Update</button>
                                    <button type="reset"
                                        class="btn btn-danger me-1 mb-1">Cancel</button>
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