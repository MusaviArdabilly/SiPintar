<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
    </head>
    <body>
       <?php
            if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] == "") {
                $this->load->view('template/header');
            } elseif ($this->session->userdata['user_role'] == "ADMIN") {
                $this->load->view('template/header_admin');
            } elseif($this->session->userdata['user_role'] == "USER"){
                $this->load->view('template/header_user');
            }
            else {
                $this->load->view('template/header');
            }
            ?>

        <!-- start banner Area -->
        <!-- <section class="relative about-banner">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            FORECAST
                        </h1>
                        <p class="text-white link-nav"><a href="<?= base_url() ?>index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Kinerja</a></p>
                    </div>
                </div>
            </div>
        </section> -->
        <div class="bradcam_area">
                <div class="bradcam_shap">
                    <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>Forecast</h3>
                                <!--<nav class="brad_cam_lists">-->
                                <!--    <ul class="breadcrumb">-->
                                <!--        <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php">Home</a></li>-->
                                <!--        <li class="breadcrumb-item active" aria-current="page">Forecast</li>-->
                                <!--      </ul>-->
                                <!--</nav>-->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- End banner Area -->

        <!-- Start contact-page Area -->
        <!-- <section class="contact-page-area section-gap"> -->
        <div class="service_area minus_padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                        <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                            <h2 style="text-align:center">FORECAST EKSPOR JAWA TIMUR JAN-DES 2019</h2>
                            <thead>
                                <tr>
                                    <th>Bulan (n)</th>
                                    <th>Nilai Y</th>
                                    <th>X</th>
                                    <th>X2</th>
                                    <th>XY</th>
                                    <!--<th>OK</th>-->
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $x = 0;
                                $totalnilai = 0;

                                $totalx=0;
                                $totalxx = 0;

                                $totalx2 = 0;
                                $totalxy = 0;

                                $count = 0;
                                foreach ($forecast as $key => $value) {

                                    $nilai  = $value->nilai;
                                    $a = $x;
                                    $b = $x * $x;
                                    $c = $a * $nilai;

                                    $totalx     += $x;
                                    $totalx2    += $b;
                                    $totalxy    += $c;
                                    $totalnilai += $nilai;

                                    $count = $count+1;
                                    $bagianx = $totalx * $totalx;

                                    //RUMUS LINEAR SEDERHANA
                                    $rumusbkali = ($count * $totalxy) - ($totalx * $totalnilai);
                                    $rumusbbagi = ($count * $totalx2) - ($bagianx);
                                    $rumusb = ($rumusbkali!=0)? ($rumusbkali/$rumusbbagi):0;
//                                    $rata=($totalnilai!=0)?($totalnilai/$jumlah) * 100:0;
                                    $rumusay = $totalnilai/$count;
                                    $rumusax = $totalx/$count;




                                    $rumusaxb = $rumusb*$rumusax;

                                    $rumusa = $rumusay-$rumusaxb;

                                    $rumusbx = $rumusb*$count;
                                    $rumuslinear = $rumusa+$rumusbx;


                                        ?>
                                        <tr>

                                            <td><?= $value->bulan ?> - <?= $value->tahun ?></td>
                                            <td><?= $value->nilai ?></td>
                                            <td><?=$x++?></td>
                                            <td><?=$b?></td>
                                            <td><?=$c?></td>

                                            <!--
                                            <td><?= (0.1 * $nilai) + (0.9 * $nilai) ?></td>
                                            <td>
                                                <?=$nilai;?>
                                            </td>
                                            -->
                                        </tr>
                                    <?php } ?>

                                        <tr>
                                            <td style="font-weight: bold">Total</td>
                                            <td style="font-weight: bold"><?=$totalnilai?></td>
                                            <td style="font-weight: bold"><?=$totalx?></td>
                                            <td style="font-weight: bold"><?=$totalx2?></td>
                                            <td style="font-weight: bold"><?=$totalxy?></td>
                                        </tr>
                                        <tr style="background-color: yellow">
                                            <td style="font-weight: bold;font-size: 20px" colspan="4">Forecast for next month</td>
                                            <td style="font-weight: bold"><?=$rumuslinear?></td>
                                        </tr>

                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>

                    <div class="col-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">FORECAST IMPOR JAWA TIMUR JAN-DES 2019</h2>
                                    <thead>
                                        <tr>
                                            <th>Bulan (n)</th>
                                            <th>Nilai Y</th>
                                            <th>X</th>
                                            <th>X2</th>
                                            <th>XY</th>
                                            <!--<th>OK</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $xi = 0;
                                        $totalnilaii = 0;

                                        $totalxi = 0;
                                        $totalxxi = 0;

                                        $totalx2i = 0;
                                        $totalxyi = 0;

                                        $counti = 0;
                                        foreach ($forecasti as $key => $value) {

                                            $nilaii = $value->nilai;
                                            $ai = $xi;
                                            $bi = $xi * $xi;
                                            $ci = $ai * $nilaii;

                                            $totalxi += $xi;
                                            $totalx2i += $bi;
                                            $totalxyi += $ci;
                                            $totalnilaii += $nilaii;

                                            $counti = $counti + 1;
                                            $bagianxi = $totalxi * $totalxi;

                                            //RUMUS LINEAR SEDERHANA
                                            $rumusbkalii = ($counti * $totalxyi) - ($totalxi * $totalnilaii);
                                            $rumusbbagii = ($counti * $totalx2i) - ($bagianxi);
                                            $rumusbi = ($rumusbkalii != 0) ? ($rumusbkalii / $rumusbbagii) : 0;
//                                    $rata=($totalnilai!=0)?($totalnilai/$jumlah) * 100:0;
                                            $rumusayi = $totalnilaii / $counti;
                                            $rumusaxi = $totalxi / $counti;




                                            $rumusaxbi = $rumusbi * $rumusaxi;

                                            $rumusai = $rumusayi - $rumusaxbi;

                                            $rumusbxi = $rumusbi * $counti;
                                            $rumuslineari = $rumusai + $rumusbxi;
                                            ?>
                                            <tr>

                                                <td><?= $value->bulan ?> - <?= $value->tahun ?></td>
                                                <td><?= $value->nilai ?></td>
                                                <td><?= $xi++ ?></td>
                                                <td><?= $bi ?></td>
                                                <td><?= $ci ?></td>

                                                <!--
                                                <td><?= (0.1 * $nilai) + (0.9 * $nilai) ?></td>
                                                <td>
    <?= $nilai; ?>
                                                </td>
                                                -->
                                            </tr>
<?php } ?>

                                        <tr>
                                            <td style="font-weight: bold">Total</td>
                                            <td style="font-weight: bold"><?= $totalnilaii ?></td>
                                            <td style="font-weight: bold"><?= $totalxi ?></td>
                                            <td style="font-weight: bold"><?= $totalx2i ?></td>
                                            <td style="font-weight: bold"><?= $totalxyi ?></td>
                                        </tr>
                                        <tr style="background-color: yellow">
                                            <td style="font-weight: bold;font-size: 20px" colspan="4">Forecast for next month</td>
                                            <td style="font-weight: bold"><?= $rumuslineari ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">FORECAST IMPOR JAWA TIMUR JAN-DES 2019</h2>
                                    <thead>
                                        <tr>
                                            <th>Bulan (n)</th>
                                            <th>Nilai Y</th>
                                            <th>X</th>
                                            <th>X2</th>
                                            <th>XY</th>
                                            <th>OK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($forecasti as $key => $value) {
                                            if($key==0){
                                                   unset($forecasti[$key]);
                                            }
                                         ?>
                                            <tr>
                                                <td><?= $value->bulan ?> - <?= $value->tahun ?></td>
                                                <td><?= $value->nilai ?></td>
                                                <td><?= $value->nilai ?></td>
                                                <td> <?= var_dump($forecasti)?></td>
                                            </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
          </div>
        <!-- </section> -->
        <!-- End contact-page Area -->

        <!-- start footer Area -->
          <?php $this->load->view('template/footer') ?>
        <!-- End footer Area -->
        <?php $this->load->view('template/js') ?>
        <script type="text/javascript">
            $("#txtTahun1").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
            $("#txtTahun2").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
            $("#txtTahun3").datepicker({
                format: "MM",
                viewMode: "months",
                minViewMode: "months"
            });
            $("#txtTahun4").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
            $("#txtTahun5").datepicker({
                format: "MM",
                viewMode: "months",
                minViewMode: "months"
            });
            $("#txtTahun6").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script>
    </body>
</html>
