<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="<?= base_url() ?>index.php">
                                <img style="width: auto;height: 40px" src="<?= base_url() ?>assets/img/logosipintar.png" alt="" title="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8">
                        <nav id="nav-menu-container">
                            <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
                                <li><a href="<?= site_url("Home_admin") ?>">Home</a></li>
                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Perdagangan Internasional</a>
                                    <ul style="display: none;">
                                        <!--<li><a href="<?= site_url("N_perdagangan") ?>">Neraca Dagang</a></li>-->
                                        <li class="menu-has-children">
                                            <a class="sf-with-ul" href="#">Neraca Dagang</a>
                                            <ul>
                                                <li><a href="<?= site_url("N_perdagangan") ?>">Pusdatin </a></li>
                                                <li><a href="<?= site_url("N_perdagangan_provjatim") ?>">Prov Jatim</a></li>
                                                <li><a href="<?= site_url("N_perdagangan_bps") ?>">BPS</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-has-children">
                                            <a class="sf-with-ul" href="#">Hubungan Dagang</a>
                                            <ul>
                                                <li><a href="<?= site_url("show/Hub_dagang") ?>">Pusdatin </a></li>
                                                <li><a href="<?= site_url("show/Hub_dagang_provjatim") ?>">Prov Jatim</a></li>
                                                <li><a href="<?= site_url("show/Hub_dagang_bps") ?>">BPS</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-has-children">
                                            <a class="sf-with-ul" href="#">Forecasting Dagang</a>
                                            <ul>
                                                <li><a href="<?= site_url("forecast") ?>">Pusdatin </a></li>
                                                <li><a href="<?= site_url("forecastbps") ?>">BPS</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= site_url("Ska_jatim") ?>">SKA Jawa Timur</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Agenda Promosi</a>
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("I_agenda") ?>">Promosi Dalam Negeri</a>
                                        </li>
                                        <li><a href="<?= site_url("I_agenda/LN") ?>">Promosi Luar Negeri</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Ekspor & Impor BPS</a>
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("show/T_Ekspor") ?>">Ekspor BPS</a>
                                        </li>
                                        <li><a href="<?= site_url("show/T_Impor") ?>">Impor BPS</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Entri Data</a>
                                    <ul style="display: none;">
                                        <!--<li><a href="<?= site_url("e_renc_kerja") ?>">Rencana Kerja PI</a></li>-->
                                        <li><a href="<?= site_url("e_penyelenggara") ?>">Data Penyelenggara</a></li>
                                        <li><a href="<?= site_url("e_eo") ?>">Data EO</a></li>
                                        <li><a href="<?= site_url("e_umkm") ?>">Data UMKM</a></li>
                                        <!--<li><a href="#">Data Provinsi dan Kota</a></li>-->
                                        <!--<li><a href="#">Data Negara</a></li>-->
                                         <li>
                                            <a class="sf-with-ul" href="#">Data SKA</a>
                                            <ul>
                                                <li><a href="<?= site_url("upload/Dataska") ?>">Upload Data SKA </a></li>
                                                <li><a href="<?= site_url("upload/Datadab") ?>">Upload Data DAB</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= site_url("e_pusdatin") ?>">Data Pusdatin</a></li>
                            
                                        <li>
                                            <a class="sf-with-ul" href="#">Data BPS</a>
                                            <ul>
                                                <li><a href="<?= site_url("e_bps_migas_nonmigas") ?>">Migas & Nonmigas </a></li>
                                                <li><a href="<?= site_url("e_bps_nasional") ?>">Nasional</a></li>
                                                <li><a href="<?= site_url("e_bps_10komoditi") ?>">Komoditi</a></li>
                                                <li><a href="<?= site_url("e_bps_negara") ?>">Negara</a></li>
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <!--                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Input Data Ekspor</a>
                                                                    <ul style="display: none;">
                                                                        <li><a href="<?= site_url("Data_ekspor_pusdatin") ?>">Ekspor - Upload Excel</a></li>
                                                                        <li><a href="<?= site_url("Data_ekspor_migas") ?>">Ekspor - Migas</a></li>
                                                                        <li><a href="<?= site_url("Data_ekspor") ?>">Ekspor - Non Migas</a></li>
                                                                        <li><a href="<?= site_url("Data_ekspor_komoditi") ?>">Ekspor - Komoditi</a></li>
                                                                        <li><a href="<?= site_url("Data_ekspor_negara") ?>">Ekspor - Negara</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Input Data Impor</a>
                                                                    <ul style="display: none;">
                                                                        <li><a href="<?= site_url("Data_impor_pusdatin") ?>">Impor - Upload Excel</a></li>
                                                                        <li><a href="<?= site_url("Data_impor_migas") ?>">Impor - Migas</a></li>
                                                                        <li><a href="<?= site_url("Data_impor") ?>">Impor - Non Migas</a></li>
                                                                        <li><a href="<?= site_url("Data_impor_komoditi") ?>">Impor - Komoditi</a></li>
                                                                        <li><a href="<?= site_url("Data_impor_negara") ?>">Impor - Negara</a></li>
                                                                    </ul>
                                                                </li>-->
                                <!--                                <li><a href="<?= site_url("Agenda") ?>">Agenda</a></li>
                                                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Tampil Data</a>
                                                                    <ul style="display: none;">
                                                                        <li><a href="<?= site_url("show/T_Ekspor") ?>">Data Ekspor</a></li>
                                                                        <li><a href="<?= site_url("show/T_Impor") ?>">Data Impor</a></li>
                                                                    </ul>
                                                                </li>-->
                                <!--                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Dropdown</a>
                                                                    <ul style="display: none;">
                                                                        <li class="menu-has-children"><a class="sf-with-ul" href="#">Dropdown 1</a>
                                                                            <ul>
                                                                                <li><a href="#">Contoh 1</a></li>
                                                                                <li><a href="#">Contoh 2</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><a href="#">Dropdown 2</a></li>
                                                                    </ul>
                                                                </li>-->
                                <li class="menu-has-children" style="float: right"><img style="width: 27px" src="<?= base_url() ?>assets/img/44948.png">
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("User") ?>">Managemen User</a></li>
                                        <li><a href="<?= site_url("Logout") ?>">Logout</a></li>
                                    </ul>

                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>