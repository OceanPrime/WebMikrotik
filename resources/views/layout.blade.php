<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('template') }}/assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    {{-- atlantis config  --}}

	{{-- <link rel="stylesheet" href="{{ asset('template') }}/assits/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('template') }}/assits/css/atlantis.min.css">
	<link href="{{ asset('template') }}/assits/styles.css" rel="stylesheet" />
	<link href="{{ asset('template') }}/assits/prism.css" rel="stylesheet" /> --}}
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('template') }}/images/logo/pix.png" alt="Logo" srcset="" width="150"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item active ">
                            <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="" class='sidebar-link'>
                                <i class="bi-solid bi-router-fill"></i>
                                <span>PPPoE</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('aktifKoneksi.index') }}">Active connection</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('server.index') }}">Server</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('secret.index') }}">Secret</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('profil.index') }}">Profile</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-wifi"></i>
                                <span>Hotspot</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('aktifKoneksiHotspot.index') }}">Active Connection</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('serverHotspot.index') }}">Server</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('serverProfil.index') }}">Server Profil</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('secretUser.index') }}">User</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('profilUser.index') }}">User Profil</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-wallet"></i>
                                <span>Keuangan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="layout-default.html">Unpaid Invoice</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-1-column.html">Finance Report</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="fa-solid fa-users"></i>
                                <span>Manajemen User</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi-solid bi-whatsapp"></i>
                                <span>WA Gateaway</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi-solid bi-percent"></i>
                                <span>Promo</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi-solid bi-cart-plus-fill"></i>
                                <span>Harga</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="/logout" class='sidebar-link'>
                                <i class="bi-solid bi-arrow-left-square-fill"></i>                                
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

{{-- content --}}
        <div class="content">
            @yield('konten')
        </div>
{{-- End Content --}}

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    {{-- <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div> --}}
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">6 Satria Kegelapan</a></p>
                    </div>
                </div>
            </footer>
      
    <script src="{{ asset('template') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('template') }}/assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('template') }}/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{ asset('template') }}/assets/js/pages/dashboard.js"></script>
    <script src="{{ asset('template') }}/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{ asset('template') }}/assets/js/main.js"></script>
</body>
</html>