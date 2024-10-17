@extends('layout')
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Active Connection Hotspot</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hotspot</li>
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
            <h4 class="card-title">Active Connection</h4>  
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Server</th>
                        <th>User</th>
                        <th>Domain</th>
                        <th>Address</th>
                        <th>Uptime</th>
                        <th>Idle Time</th>
                        <th>Session Time</th>
                        <th>Rx Rate</th>
                        <th>Tx Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Senna Kokop Jempol</td>
                        <td>Router 1</td>
                        <td>0845 46 4999</td>
                        <td>192.168.10.1</td>
                        <td>192.168.10.1</td>
                        <td>192.168.10.1</td>
                        <td>192.168.10.1</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection