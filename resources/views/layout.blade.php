<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('template') }}/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('template') }}/assets/images/logo/pea.png" alt="Logo" srcset=""></a>
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
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>PPPoE</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Server</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Secret</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Profile</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Active connection</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Hotspot</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="extra-component-avatar.html">Server</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-sweetalert.html">Server Profil</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-sweetalert.html">User Secret</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-sweetalert.html">User Profil</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
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

                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Manajemen User</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
                            <a href="/logout" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
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
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('template') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('template') }}/assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('template') }}/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{ asset('template') }}/assets/js/pages/dashboard.js"></script>

    <script src="{{ asset('template') }}/assets/js/main.js"></script>
</body>
</html>