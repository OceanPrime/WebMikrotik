<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login Router</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template/css') }}/style.css">
</head>
<body class="bg-gradient-to-tr from-sky-600 to-red-500">
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card" style="backdrop-filter: blur(20px); background-color: rgba(255, 255, 255, 0.5)">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('template/images') }}/pea.png" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7" style="text-align: center; align-items:center;">
                        <div class="card-body" style="">
                            <div class="brand-wrapper" style="text-align: center;">
                                <img src="{{ asset('template/images') }}/pix.png" alt="logo" class="logo" style="min-height: 150px; margin:-10%; width:80%;">
                            </div>
                            <p class="login-card-description">Hi, Bos Taufiq Please Login your account Router</p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="login-admin" action="" method="POST" style="align-items: center;">
                                @csrf
                                <div class="form-group">
                                    <label for="user" class="sr-only">IP Address</label>
                                    <input type="text" name="ip" id="ip" class="form-control" value="{{ old('ip') }}" placeholder="IP Address">
                                    @error('ip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">User</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="User Router">
                                    @error('user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pass" class="sr-only">Password</label>
                                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn btn-block login-btn mb-4" type="submit" style="background: rgba(13, 176, 242,1);">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('failed'))
        <script>
            Swal.fire({ 
                icon: "error",
                title: "{{$message}}",
            });
        </script>
    @endif
    @if($message = Session::get('Success'))
        <script>
           Swal.fire({
            position: "center",
            icon: "success",
            title: '{{ $message }}',
            showConfirmButton: false,
            timer: 1500
            });
        </script>
    @endif
</body>
</html>
