<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="<?= base_url()?>index.php">
                                <img style="width: auto;height: 40px" src="<?= base_url()?>assets/img/logosipintar.png" alt="" title="" />
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
                                        <li><a href="<?= site_url("forecast") ?>">Forecasting Dagang</a></li>
                                        <li><a href="<?= site_url("Ska_jatim") ?>">SKA Jawa Timur</a></li>
                                    </ul>
                                </li>
                                
                            <li class="menu-has-children"><a href="#" class="sf-with-ul">Agenda Promosi</a>
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("I_agenda/show") ?>">Promosi Dalam Negeri</a>
                                        </li>
                                        <li><a href="<?= site_url("I_agenda/showLN") ?>">Promosi Luar Negeri</a></li>
                                    </ul>
                                </li>
                                
                                  <li class="menu-has-children"><a href="#" class="sf-with-ul">Ekspor & Impor BPS</a>
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("show/T_Ekspor") ?>">Ekspor BPS</a>
                                        </li>
                                        <li><a href="<?= site_url("show/T_Impor") ?>">Impor BPS</a></li>
                                    </ul>
                                </li>
                                
                                <li class="menu-has-children"><a href="#" class="sf-with-ul">Rencana Kerja PI </a>
                                    <ul style="display: none;">
                                        <li><a href="<?= site_url("E_renc_kerja/show") ?>">Rencana Kerja PI</a>
                                        </li>
                                        <li><a href="<?= site_url("E_renc_kerja/showhasil") ?>">Hasil Kerja PI</a>
                                        </li>
                                    </ul>
                                </li>
                                
                            <li class="menu-has-children"><img style="width: 27px" src="<?= base_url()?>assets/img/44948.png">
                                <ul style="display: none;">
                                    <li><a href="<?= site_url("Logout")?>">Logout</a></li>
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
