<html>
<head>
    <title>Web Surat</title>
    <!-- META TAGS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='PSSI Surat' name='description'/>
    <meta content='pssi, surat, pinjam' name='keywords'/>
    <meta content='BEM PSSI' name='author'/>

    <!-- CSS -->
    <link rel="stylesheet" href="/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" id="css-main" href="/css/oneui.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/css/nigran-datepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    @yield('css')
</head>
<body>
<div id="custom-bootstrap-menu" class="navbar navbar-default">
    <div id="wrapper">
        <div class="row">
            <div class="col-sm-7">
                <a class="navbar-brand" href="#" style="width: 100%">
                    <div class="row">
                        <img class="col-sm-1" src="/img/logo.png" style="width: 95px">
                        <div class="col-sm-10">
                            <p style="margin-top: 10px;">SISTEM INFORMASI PERSURATAN KEGIATAN ORMAWA</p>
                            <p>Sistem Informasi Universitas Jember</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-5">
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="/">Beranda</a>
                            </li>
                            <li class="active"><a href="/login">Login</a>
                            </li>
                        @elseif(Auth::user()->can('access.admin'))
                            <li><a href="/home">Beranda</a>
                            </li>
                            <li><a href="/user">Akun</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Barang <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/alat">Alat</a></li>
                                    <li><a href="/ruang">Ruang</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{Auth::user()->name}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>

                        @else
                            <li><a href="/home">Beranda</a>
                            </li>
                            <li>
                                <a href="/peminjaman">Peminjaman</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{Auth::user()->name}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="welcome">
    <div class="row">
        @yield('content')

        <div class="col-sm-12">
            <div id="footer">
                <p>Copyright@pssi2016</p>
            </div>
        </div>
    </div>


</div>
<div id="wrapper">

</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>



<!--  jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="/js/jquery.slimscroll.min.js"></script>
<script src="/js/jquery.scrollLock.min.js"></script>
<script src="/js/jquery.appear.min.js"></script>
<script src="/js/jquery.countTo.min.js"></script>
<script src="/js/jquery.placeholder.min.js"></script>

@yield('script')
</body>
</html>
