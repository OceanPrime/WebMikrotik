@extends('layout')
@section('konten')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Pesan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('message.index') }}">Messages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pesan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Tambah Pesan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('message.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis_pesan">Jenis Pesan</label>
                    <input name="jenis_pesan" id="jenis_pesan" class="form-control" rows="5" placeholder="Jenis Pesan" required>
                    @error('jenis_pesan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="pesan">Isi Pesan</label>
                    <textarea name="pesan" id="pesan" class="form-control" rows="5" placeholder="Masukkan isi pesan" required></textarea>
                    @error('pesan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('message.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection