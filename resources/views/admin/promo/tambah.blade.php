@extends('layout')
@section('konten')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Promosi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Promosi</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Promosi</li>
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
                    <h4 class="card-title">Add Promosi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{ route('promo.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" id="deskripsi" class="form-control"
                                            placeholder="Deskripsi..." name="deskripsi">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-start">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="{{ route('promo.index') }}" class="btn btn-danger me-1 mb-1">
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