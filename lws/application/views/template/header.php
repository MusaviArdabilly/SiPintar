<!-- <header id="header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.html"><img style="width: 130px;height: 30px" src="<?= base_url() ?>assets/img/logosipintar.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="<?= base_url() ?>index.php">Home</a></li> -->
<!--                            <li class="menu-has-children"><a href="#">EKSPOR</a>
                                <ul>
                                    <li><a href="<?= base_url() ?>index.php/K_ekspor">KINERJA EKSPOR</a></li>
                                    <li><a href="<?= base_url() ?>index.php/K_ekspor_sektor">EKSPOR NON MIGAS PER SEKTOR</a></li>
                                    <li><a href="<?= base_url() ?>index.php/K_ekspor_peran">PERAN EKSPOR</a></li>
                                </ul>
                            </li>
                            <li class="menu-has-children"><a href="#">IMPOR</a>
                                <ul>
                                    <li><a href="<?= base_url() ?>index.php/K_impor">KINERJA IMPOR</a></li>
                                    <li><a href="<?= base_url() ?>index.php/K_impor_sektor">IMPOR NON MIGAS PER SEKTOR</a></li>
                                    <li><a href="<?= base_url() ?>index.php/K_impor_peran">PERAN IMPOR</a></li>
                                </ul>
                            </li>-->
<!--                            <li class="menu-has-children"><a href="#">Perdangan</a>
                                <ul>
                                    <li><a href="<?= base_url() ?>index.php/N_perdagangan">Neraca Perdangan</a></li>
                                    <li><a href="<?= base_url() ?>index.php/show/Hub_dagang">Hubungan Dagang</a></li>
                                    <li><a href="<?= base_url() ?>index.php/forecast">Forecasting</a></li>
                                </ul>
                            </li>
                            <li class="menu-has-children"><a href="#">Renc. Agenda</a>
                                <ul>
                                    <li><a href="<?= base_url() ?>index.php/I_agenda">Pameran Dalam Negeri</a></li>
                                    <li><a href="<?= base_url() ?>index.php/I_agenda/LN">Promosi Luar Negeri</a></li>
                                </ul>
                            </li>
                            <li class="menu-has-children"><a href="#">Input Data Ekspor</a>
                                <ul>
                                    <li><a href="<?= base_url() ?>index.php/Data_ekspor_pusdatin">Ekspor - Upload Excel</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_ekspor_migas">Ekspor - Migas</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_ekspor">Ekspor - Non Migas</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_ekspor_komoditi/">Ekspor - Komoditi</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_ekspor_negara/">Ekspor - Negara</a></li>
                                </ul>
                            </li>
                            <li class="menu-has-children"><a href="#">Input Data Impor</a>
                                <ul>
                                    <li><a href="<?= base_url() ?>index.php/Data_impor_pusdatin">Impor - Upload Excel</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_impor_migas">Impor - Migas</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_impor">Impor - Non Migas</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_impor_komoditi/">Impor - Komoditi</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Data_impor_negara/">Impor - Negara</a></li>
                                </ul>
                            </li>-->
<!--                            <li><a href="<?= base_url() ?>index.php/Agenda">Agenda</a></li>
                             <li><a href="<?= base_url() ?>index.php/show/T_Ekspor">Tampil Data</a></li>
                             <li class="menu-has-children"><a href="#">Tampil Data</a>
                                <ul>
                                    <li><a href="<?= base_url() ?>index.php/show/T_Ekspor">Data Ekspor</a></li>
                                    <li><a href="<?= base_url() ?>index.php/show/T_Impor">Data Impor</a></li>
                                </ul>
                            </li>-->
<!-- <li>
    <a href="<?= base_url() ?>index.php/Login">Login</a>
</li>
</ul>
</nav> -->
<!-- #nav-menu-container -->
<!-- </div>
</div>
</header> -->

<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="<?= base_url() ?>index.php">
                                <img style="width: 130px;height: 30px" src="<?= base_url() ?>assets/img/logosipintar.png" alt="" title="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <nav id="nav-menu-container">
                            <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
                                <li><a href="<?= base_url() ?>index.php">Home</a></li>
                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Perdagangan Internasional</a>
                                    <ul style="display: none;">
                                        <!--<li><a href="<?= site_url("N_perdagangan") ?>">Neraca Dagang</a></li>-->
                                        <li class="menu-has-children">
                                            <a class="sf-with-ul" href="#">Neraca Dagang</a>
                                            <ul>
                                                <li><a href="<?= site_url("N_perdagangan_bps") ?>">BPS</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-has-children">
                                            <a class="sf-with-ul" href="#">Hubungan Dagang</a>
                                            <ul>
                                                <li><a href="<?= site_url("show/Hub_bps") ?>">BPS</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                               <li class="menu-has-children"><a href="#" class="sf-with-ul">Agenda</a>
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("show/Agenda/") ?>">Promosi Dalam Negeri</a>
                                        </li>
                                        <li><a href="<?= site_url("show/Agenda/LN") ?>">Promosi Luar Negeri</a></li>
                                    </ul>
                                </li>

                                <li class="menu-has-children"><a href="#" class="sf-with-ul">EXIM BPS</a>
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("show/T_Ekspor") ?>">Ekspor BPS</a>
                                        </li>
                                        <li><a href="<?= site_url("show/T_Impor") ?>">Impor BPS</a></li>
                                    </ul>
                                </li>
                                <li> <a href="<?= base_url() ?>index.php/Login">Login</a></li>
                                <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="Case_details.html">Case  details</a></li>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="elements.html">elements</a></li>
                                    </ul>
                                </li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="Case_Study.html">Case Study</a></li>
                                <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="single-blog.html">single-blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <!--<div class="col-xl-3 col-lg-3 d-none d-lg-block">-->
                <!--    <div class="Appointment">-->
                <!--        <div class="book_btn d-none d-lg-block">-->
                <!--            <a href="<?= base_url() ?>index.php/Login">Login</a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none">
                        <!--<a href="<?= base_url() ?>index.php/Login">Login</a>-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header>
