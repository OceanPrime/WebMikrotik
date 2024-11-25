@extends('layout')
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Finance Report</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Finance Report</li>
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
                        <th>Name</th>
                        <th>Service</th>
                        <th>Celler ID</th>
                        <th>Address</th>
                        <th>Uptime</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Senna Kokop Jempol</td>
                        <td>Router 1</td>
                        <td>0845 46 4999</td>
                        <td>192.168.10.1</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ahong si kampas kopling</td>
                        <td>Router 2</td>
                        <td>0845 46 49</td>
                        <td>192.168.10.1</td>
                        <td>
                            <span class="badge bg-warning">Deactive</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Topuq Tambal Ban</td>
                        <td>Router 3</td>
                        <td>0845 4644 4911</td>
                        <td>192.168.10.1</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Aris Sedot WC</td>
                        <td>Router 4</td>
                        <td>0845 46 49334</td>
                        <td>192.168.10.1</td>
                        <td>
                            <span class="badge bg-warning">Deactive</span>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Aldy Taher si pencari dada</td>
                        <td>Router 5</td>
                        <td>0845 4611 4999</td>
                        <td>192.168.10.1</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Ridwan BIBD</td>
                        <td>Router 6</td>
                        <td>0845 4611 4999</td>
                        <td>192.168.10.1</td>
                        <td>
                            <span class="badge bg-warning">Deactive</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection