<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    {{-- Summernote CSS di antara Head --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
</head>

<body class="hold-transition sidebar-mini">


    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/Admin" class="nav-link">Dashboard</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/Admin" class="brand-link">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Admin Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Admin.DataYayasan.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Yayasan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Admin/hero-section" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hero Section</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Admin/gallery" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gallery</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/relawan" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Relawan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/donatur" class="nav-link">
                                <i class="nav-icon fas fa-donate"></i>
                                <p>
                                    Donatur
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Admin.News.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Admin.NewsCategory.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>News Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>
                                    Announcement
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Admin.Announcement.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Announcement</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Admin.AnnouncementCategory.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Announcement Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/sponsor" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Sponsor
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/kemitraan" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Kemitraan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Statistik <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Admin/anakdisabilitas" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Anak Disabilitas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Admin/anaksekolahinformal" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Anak Sekolah Informal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Admin/stafpegawai" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Staf/Pegawai</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="" class="nav-link log-out">
                                <i class="nav-icon fa-solid fa-power-off" style="color: red;"></i>
                                <p>Logout</p>
                            </a>
                            <form action="/logout" method="POST" id="logging-out">
                                @csrf
                            </form>
                            <style>
                                .log-out.nav-link {
                                    color: #ffffff;
                                    /* Warna teks */
                                    background-color: transparent !important;
                                    /* Hapus warna latar belakang */
                                    box-shadow: none !important;
                                }
                            </style>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2024 <a href="/Admin">Admin YPA Rumah Damai</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Summernote JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
            });
        });

        const navbar = document.querySelector('.fixed-top');
        if (navbar) {
            window.onscroll = () => {
                if (window.scrollY > 100) {
                    navbar.classList.add('scroll-nav-active');
                    navbar.classList.remove('navbar-dark');
                } else {
                    navbar.classList.remove('scroll-nav-active');
                    navbar.classList.add('navbar-dark');
                }
            };
        }
    </script>

    <script>
        $(function() {
            var url = window.location;
            // for single sidebar menu
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');

            // for sidebar menu and treeview
            $('ul.nav-treeview a').filter(function() {
                    return this.href == url;
                }).parentsUntil(".nav-sidebar > .nav-treeview")
                .css({
                    'display': 'block'
                })
                .addClass('menu-open').prev('a')
                .addClass('active');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                responsive: true
            });

        });
    </script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        $(document).ready(function() {
            $(".log-out").on('click', function(e) {
                e.preventDefault();
                $('.nav-link').removeClass('active'); // hapus kelas active dari semua link navigasi
                $(this).addClass('active'); // tambahkan kelas active ke link yang diklik
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7367f0',
                    cancelButtonColor: '#82868b',
                    confirmButtonText: 'Yes, Log Out !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#logging-out').submit()
                    }
                })
            });
        });
    </script>


</body>

</html>
