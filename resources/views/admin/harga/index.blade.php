@extends('layout')
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Harga</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">harga</li>
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
                <h4 class="card-title"></h4>
                <a href="{{ route('harga.tambah') }}">
                    <button class="btn btn-primary rounded-pill">
                        <i class="fa fa-plus"></i>
                        Add Harga
                    </button>
                </a>
            </div>   
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                                @foreach ($data as $item)
                                    <tr> 
                                        <td>{{ $i }}</td>
                                        <td>
                                            @if($item->gambar_harga)
                                                <img style="max-width:100px;max-height:100px" src="{{ asset('harga/' . $item->gambar_harga) }}" alt="Profile Picture">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->deskripsi_harga }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('harga.edit', $item->id) }}">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <form onsubmit="return confirm('Are you sure you want to delete this data?')"  action="{{ route('harga.destroy', $item->id)}}" class="d-inline" method="GET">
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
</section>
@endsection