@extends('layout')
@section('konten')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Secret PPPoE</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">PPPoE</li>
                        <li class="breadcrumb-item active" aria-current="page">Secret</li>
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
                    <h4 class="card-title">Update Secret</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{ route('secret.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Username</label>
                                        <input type="text" id="name" value="{{ $user['name'] ?? '' }}" class="form-control"
                                            placeholder="Username" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" id="password" class="form-control"
                                            placeholder="Password" name="password" value="{{ $user['password'] ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="service">Services</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="service" name="service">
                                                <option selected>{{ $user['service'] }}</option>
                                                <option value="any">ANY</option>
                                                <option value="async">ASYNC</option>
                                                <option value="l2tp">L2TP</option>
                                                <option value="ovpn">OVPN</option>
                                                <option value="pppoe">PPPOE</option>
                                                <option value="pptp">PPTP</option>
                                                <option value="sstp">SSTP</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="local-address">Local Address</label>
                                        <input type="text" id="local-address" class="form-control"
                                            name="local-address" placeholder="Local Address" value="{{ $user['local-address'] ?? '' }}"> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="role">Profile</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="profile" name="profile">
                                                <option selected disabled>--Pilih Profile--</option>
                                                <option selected>{{ $user['profile'] }}</option>
                                                @foreach ($profile as $data)
                                                    <option>{{ $data['name'] }}</option>        
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="remote-address">Remote Address</label>
                                        <input type="text" id="remote-address" class="form-control"
                                            name="remote-address" placeholder="Remote Address" value="{{$user['remote-address'] ?? '' }}" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="remote-address">Status</label>
                                        <select class="form-control" name="disabled">
                                            <option selected disabled>--Pilih Status--</option>
                                            @if ($user['disabled']== 'false')
                                                <option value="true">Active</option>
                                                <option value="false" selected>Deactive</option>
                                            @elseif ($user['disabled'] == 'true')
                                                <option value="true" selected>Active</option>
                                                <option value="false">Deactive</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <input type="text" id="comment" class="form-control"
                                            name="comment" placeholder="Comment" value="{{ $user['comment'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-start">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('secret.index') }}" class="btn btn-danger me-1 mb-1">
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