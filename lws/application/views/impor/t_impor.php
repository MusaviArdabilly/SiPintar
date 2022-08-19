<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"/>

    </head>
    <!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 280px;
}
#Barchartdiv {
  width: 100%;
  height: 280px;
}

</style>

<body style="background: rgba(202, 202, 202, 0.28);">
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

        <!-- banner -->
        <div class="bradcam_area">
                <div class="bradcam_shap">
                    <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>DATA IMPOR</h3>
                                <p style="text-align:center;color: #8490ff"> Data Berdasarkan BPS</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- end banner -->

        <!-- Start contact-page Area -->
        <div class="service_area minus_padding">
            <div class="container">
                <div class="card-body card-block" >
                    <div class="row">
                        
                        <div class="col-lg-6 offset-3">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner">
                                    <h3 class="title-2 m-b-40" style="text-align:center">MIGAS & NONMIGAS TAHUN <?= date('Y') ?></h3>
                                     <div id="chartdiv"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body card-block" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner"> 
                                    <h3 class="title-2 m-b-40" style="text-align:center">SEKTOR NON MIGAS TAHUN <?= date('Y') ?></h3>
                                    <div id="Barchartdiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="au-card m-b-30" >
                        <div class="au-card-inner">
                            <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%;background-color: white">
                                <h2 style="text-align:center">KINERJA IMPOR JAWA TIMUR <?= date('Y') ?></h2>
                                    <p style="text-align:center;" >Data berdasarkan BPS</p>
                                <thead>
                                    <tr style="background: #c3c3c3;">
                                        <th>No</th>
                                        <th>Realisasi Impor</th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );$originalDate->modify( '-1 month' );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y', strtotime('-1 years')) ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y') ;?></th>
                                        <th style="text-align:center">d(%)*</th>
                                        <th style="text-align:center">Peran(%)</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php


                                    $total1 = 0;
                                    $total2 = 0;
                                    $total3 = 0;
                                    $total4 = 0;

                                    foreach ($kinerja as $value) {
                                        $total4 += $value->nilai4;
                                    }
                                    $i = 1;
                                    foreach ($kinerja as $key => $value) {
                                        $total1 += $value->nilai1;
                                        $total2 += $value->nilai2;
                                        $total3 += $value->nilai3;
                                        ?>

                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value->kategori ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai1, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai2, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai3, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai4, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= ($value->nilai3) ? number_format(($value->nilai4 - $value->nilai3) / $value->nilai3 * 100, 2, ",", ".") : 0 ?></td>
                                          <?php if($value->nilai4==0) {?>
                                            <td style="text-align:right">-</td>
                                            <?php }else { ?>
                                            <td style="text-align:right"><?= number_format($value->nilai4 / $total4 * 100, 2, ",", ".") ?></td>
                                            <?php }?>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td></td>
                                        <td>TOTAL</td>
                                        <td style="text-align:right"><?= number_format($total1, 2, ",", ".") ?></td>
                                        <td style="text-align:right"><?= number_format($total2, 2, ",", ".") ?></td>
                                        <td style="text-align:right"><?= number_format($total3, 2, ",", ".") ?></td>
                                        <td style="text-align:right"><?= number_format($total4, 2, ",", ".") ?></td>
                                        <td style="text-align:right"><?= ($total3) ? number_format(($total4 - $total3) / $total3 * 100, 2, ",", ".") : 0 ?></td>
                                        <td style="text-align:right">100</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <div class="container">
                <div class="col-lg-12">
                    <div class="au-card m-b-30" >
                        <div class="au-card-inner">
                            <table id="sektor" class="table table-hover responsive nowrap" style="width:100%;background-color: white">
                                <h2 style="text-align:center">IMPOR NON MIGAS PER SEKTOR <?= date('Y') ?></h2>
                                    <p style="text-align:center;" >Data berdasarkan BPS</p>
                                <thead>
                                    <tr style="background: #c3c3c3;">
                                        <th>No</th>
                                        <th>Realisasi Impor</th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );$originalDate->modify( '-1 month' );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y', strtotime('-1 years')) ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y') ;?></th>
                                        <th style="text-align:center">d(%)*</th>
                                        <th style="text-align:center">Peran(%)</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php



                                    $total4 = 0;

                                    foreach ($sektor as $value) {
                                        $total4 += $value->nilai4;
                                    }
                                    $i = 1;
                                    foreach ($sektor as $key => $value) {
                                        ?>

                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value->sektor ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai1, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai2, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai3, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai4, 2, ",", ".") ?></td>
                                            <td style="text-align:right"><?= ($value->nilai3) ? number_format(($value->nilai4 - $value->nilai3) / $value->nilai3 * 100, 2, ",", ".") : 0 ?></td>

                                            <?php if($value->nilai4==0) {?>
                                            <td style="text-align:right">-</td>
                                            <?php }else { ?>
                                            <td style="text-align:right"><?= number_format($value->nilai4 / $total4 * 100, 2, ",", ".") ?></td>
                                            <?php }?>
                                        </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-lg-12">
                    <div class="au-card m-b-30" >
                        <div class="au-card-inner" style="overflow-x:auto">
                            <form method="POST" action="<?= base_url()?>index.php/T_ekspor/getDataEkspor">
                            <table id="komoditi" class="table table-hover responsive nowrap" style="width:100%;background-color: white">
                                <h2 style="text-align:center">10 KOMODITI IMPOR UTAMA JAWA TIMUR 
                                </h2>
                                    <p style="text-align:center;">Data berdasarkan BPS</p>
                                    
<!--                                    <div class="col-lg-4 form-group">
                                        <input name="tanggal" id="txtTahun1" placeholder="TANGGAL AGENDA"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <button class="btn btn-dark" type="submit">SEARCH</button>
                                    </div>-->
                                <thead>
                                      <tr style="background: #c3c3c3;">
                                        <th>HS</th>
                                        <th style="text-align:center">Uraian</th>
                                         <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );$originalDate->modify( '-1 month' );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y', strtotime('-1 years')) ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y') ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.date('M', strtotime('-1 month')).'<br>(M to M)'?></th>
                                        <th style="text-align:center"><?= date('Y', strtotime('-1 years')).' - '. date('Y').'<br>(Y to Y)'?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo 'share<br>'.$originalDate->format("M").' '.date('Y') ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo 'share<br>'.date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y') ;?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                            $total1 = 0;
                                            $total2 = 0;
                                            $total3 = 0;
                                            $total4 = 0;
                                            $total5 = 0;
                                            $total6 = 0;
                                            $total7 = 0;
                                            $total8 = 0;
                                            foreach ($komoditi as $key => $value) {
                                         
                                            $total1 += $value->nilai1;
                                            $total2 += $value->nilai2;
                                            $total3 += $value->nilai3;
                                            $total4 += $value->nilai4;
                                             
                                             $total5 += @($value->nilai4 - $value->nilai3) / $value->nilai3 * 100;
                                             $total6 += @($value->nilai2 - $value->nilai1) / $value->nilai1 * 100;
                                             $total7 += @($value->nilai2 / ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100;
                                             $total8 += @($value->nilai4 / ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100;
                                         ?>
                                <tr>
                                    
                                      <td><?=$value->kode_hs?></td>
                                      <td><?=$value->uraian_hs?></td>
                                      <!--<td><?=$value->bulan_tahun?></td>-->
                                      <td style="text-align:right"><?= number_format($value->nilai1,2, ",", ".")?></td>
                                      <td style="text-align:right"><?= number_format($value->nilai2,2, ",", ".")?></td>
                                      <td style="text-align:right"><?= number_format($value->nilai3,2, ",", ".")?></td>
                                      <td style="text-align:right"><?= number_format($value->nilai4,2, ",", ".")?></td>
                                      <td style="text-align:right">
                                          <?= ($value->nilai3) ? number_format(@($value->nilai4 - $value->nilai3) / $value->nilai3 * 100, 2, ",", ".") : 0 ?>
                                      </td>
                                      <td style="text-align:right">
                                          <?= ($value->nilai1) ? number_format(@($value->nilai2 - $value->nilai1) / $value->nilai1 * 100, 2, ",", ".") : 0 ?>
                                      </td>
                                      <td style="text-align:right">
                                          <?= ($value->nilai2) ? number_format(@($value->nilai2 /  (($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100),2, ",", ".") :0 ?>
                                      </td>
                                      <td style="text-align:right">
                                          <?= ($value->nilai4) ? number_format(@($value->nilai4 / (($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100),2, ",", ".") : 0?>
                                      </td>
                                </tr>
                                
                                     <?php }?>
                                <tr>
                                    <td colspan="2">Jumlah 10 Golongan Barang</td>
                                    <td style="text-align:right">
                                        <?= number_format($total1,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total2,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total3,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total4,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total5,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total6,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total7,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total8,2, ",", ".")?>
                                    </td>
                                </tr>
                                 <?php 
                                            $totallain5 = 0;
                                            $totallain6 = 0;
                                            $totallain7 = 0;
                                            $totallain8 = 0;
                                            
                                            foreach ($komodititotal as $key => $value) { 
                                             
                                             $totallain5 += ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100;
                                             $totallain6 += ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100;
                                             $totallain7 += ($value->nilai2 / ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100 ;
                                             $totallain8 += @($value->nilai4 / ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100;
                                            ?>
                              
                                
                                <tr>
                                    <td colspan="2">LAINYA</td>
                                    <td style="text-align:right">
                                        <?= number_format($komodititotallain->nilai1 - $total1,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($komodititotallain->nilai2 - $total2,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($komodititotallain->nilai3 - $total3,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($komodititotallain->nilai4 - $total4,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain5 - $total5,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain6 - $total6,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain7 - $total7,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain8 - $total8,2, ",", ".")?>
                                    </td>
                                </tr>
                                 <?php }?>
                                 <?php 
                                   $total1 = 0;
                                            $total2 = 0;
                                            $total3 = 0;
                                            $total4 = 0;
                                            $total5 = 0;
                                            $total6 = 0;
                                            $total7 = 0;
                                            $total8 = 0;
                                            
                                            foreach ($komodititotal as $key => $value) { 
                                            $total1 += $value->nilai1;
                                            $total2 += $value->nilai2;
                                            $total3 += $value->nilai3;
                                            $total4 += $value->nilai4;
                                             
                                             $total5 += ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100;
                                             $total6 += ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100;
                                             $total7 += ($value->nilai2 / ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100 ;
                                             $total8 += @($value->nilai4 / ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100;
                                             ?>
                                <tr>
                                   
                                    <td colspan="2">
                                        TOTAL NILAI NONMIGAS
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total1,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total2,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total3,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total4,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total5,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total6,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total7,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total8,2, ",", ".")?>
                                    </td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-lg-12">
                    <div class="au-card m-b-30" >
                        <div class="au-card-inner" style="overflow-x:auto">
                            <table id="negara" class="table table-hover responsive nowrap" style="width:100%;background-color: white">
                                <h2 style="text-align:center">10 NEGARA TUJUAN IMPOR UTAMA JAWA TIMUR </h2>
                                <p style="text-align:center;" >Data berdasarkan BPS</p>
                                <thead>
                                    
                                     <tr style="background: #c3c3c3;">
                                        <th>Negara</th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );$originalDate->modify( '-1 month' );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo $originalDate->format("F Y");?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y', strtotime('-1 years')) ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y') ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo date('M', strtotime('01')).' - '.$originalDate->format("M").'<br>(M to M)'?></th>
                                        <th style="text-align:center"><?= date('Y', strtotime('-1 years')).' - '. date('Y').'<br>(Y to Y)'?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo 'share<br>'.$originalDate->format("M").' '.date('Y') ;?></th>
                                        <th style="text-align:center"><?php $originalDate = new DateTime( "$databulan->tahun" );echo 'share<br>'.date('M', strtotime('01')).' - '.$originalDate->format("M").' '.date('Y') ;?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $total1 = 0;
                                            $total2 = 0;
                                            $total3 = 0;
                                            $total4 = 0;
                                            $total5 = 0;
                                            $total6 = 0;
                                            $total7 = 0;
                                            $total8 = 0;
                                            foreach($negara as $key => $value){
                                                
                                            $total1 += $value->nilai1;
                                            $total2 += $value->nilai2;
                                            $total3 += $value->nilai3;
                                            $total4 += $value->nilai4;
                                             
                                             $total5 += ($value->nilai4) ? round(($value->nilai4 - $value->nilai3) / $value->nilai3 * 100,2):0;
                                             $total6 += ($value->nilai2) ? round(($value->nilai2 - $value->nilai1) / $value->nilai1 * 100,2):0;
                                             $total7 += ($value->nilai2) ? round(($value->nilai2 / ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100,2):0;
                                             $total8 += @($value->nilai4 / ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100;?>
                                    <tr>
                                            <td><?=$value->negara?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai1,2, ",", ".")?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai2,2, ",", ".")?></td>
                                            <td style="text-align:right"><?= number_format($value->nilai3,2, ",", ".")?></td>
                                            <td style="text-align:right"><?=number_format($value->nilai4,2, ",", ".")?></td>
                                            <td style="text-align:right">
                                                <?= ($value->nilai3) ? number_format(@($value->nilai4 - $value->nilai3) / $value->nilai3 * 100, 2, ",", ".") : 0 ?>
                                            </td>
                                            <td style="text-align:right">
                                                <?= ($value->nilai1) ? number_format(@($value->nilai2 - $value->nilai1) / $value->nilai1 * 100, 2, ",", ".") : 0 ?>
                                            </td>
                                            <td style="text-align:right">
                                                <?= ($value->nilai2) ? number_format(@($value->nilai2 /  (($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100),2, ",", ".") :0 ?>
                                            </td>
                                            <td style="text-align:right">
                                                <?= ($value->nilai4) ? number_format(@($value->nilai4 / (($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100),2, ",", ".") : 0?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        <tr>
                                    <td>Jumlah 10 Negara Impor</td>
                                    <td style="text-align:right">
                                        <?= number_format($total1,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total2,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total3,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total4,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total5,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total6,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total7,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total8,2, ",", ".")?>
                                    </td>
                                </tr>
                                 <?php 
                                            $totallain5 = 0;
                                            $totallain6 = 0;
                                            $totallain7 = 0;
                                            $totallain8 = 0;
                                            
                                            foreach ($negaratotal as $key => $value) { 
                                             
                                             $totallain5 += ($value->nilai4) ? round(($value->nilai4 - $value->nilai3) / $value->nilai3 * 100,2):0;
                                             $totallain6 += ($value->nilai2) ? round(($value->nilai2 - $value->nilai1) / $value->nilai1 * 100,2):0;
                                             $totallain7 += ($value->nilai2) ? round(($value->nilai2 / ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100,2):0 ;
                                             $totallain8 += @($value->nilai4 / ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100;
                                            ?>
                              
                                
                                <tr>
                                    <td>LAINYA</td>
                                    <td style="text-align:right">
                                        <?= number_format($negaratotallain->nilai1 - $total1,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($negaratotallain->nilai2 - $total2,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($negaratotallain->nilai3 - $total3,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($negaratotallain->nilai4 - $total4,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain5 - $total5,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain6 - $total6,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain7 - $total7,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($totallain8 - $total8,2, ",", ".")?>
                                    </td>
                                </tr>
                                 <?php }?>
                                <?php 
                                   $total1 = 0;
                                            $total2 = 0;
                                            $total3 = 0;
                                            $total4 = 0;
                                            $total5 = 0;
                                            $total6 = 0;
                                            $total7 = 0;
                                            $total8 = 0;
                                            
                                            foreach ($negaratotal as $key => $value) { 
                                            $total1 += $value->nilai1;
                                            $total2 += $value->nilai2;
                                            $total3 += $value->nilai3;
                                            $total4 += $value->nilai4;
                                             
                                             $total5 += ($value->nilai4) ? round(($value->nilai4 - $value->nilai3) / $value->nilai3 * 100,2):0;
                                             $total6 += ($value->nilai2) ? round(($value->nilai2 - $value->nilai1) / $value->nilai1 * 100,2):0;
                                             $total7 += ($value->nilai2) ? round(($value->nilai2 / ($value->nilai2 - $value->nilai1) / $value->nilai1 * 100) *100,2):0 ;
                                             $total8 += @($value->nilai4 / ($value->nilai4 - $value->nilai3) / $value->nilai3 * 100) *100;
                                             ?>
                                <tr>
                                    <td>
                                        TOTAL NILAI NONMIGAS
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total1,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total2,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total3,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total4,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total5,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total6,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total7,2, ",", ".")?>
                                    </td>
                                    <td style="text-align:right">
                                        <?= number_format($total8,2, ",", ".")?>
                                    </td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End contact-page Area -->

        
        
        
        
        <!-- start footer Area -->
        <?php $this->load->view('template/footer') ?>
        <!-- End footer Area -->
<?php $this->load->view('template/js') ?>
        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <!--export datatable-->
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

        
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
    
      $("#txtTahun1").datepicker({
                format: "M - yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
            
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
                    am4core.useTheme(am4themes_animated);
                    function am4themes_material(target) {
                                    if (target instanceof am4core.ColorSet) {
                                        target.list = [
                                            am4core.color("#2196f3"),
                                            am4core.color("#f44336")
                                        ];
                                    }
                                }
// Themes end

var chart = am4core.create("chartdiv", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = <?php echo json_encode($pie1) ?>

chart.innerRadius = 50;

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "thn<?=date('Y')?>";
series.dataFields.category = "kategori";

}); // end am4core.ready()
</script>
<!-- BAR Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("Barchartdiv", am4charts.XYChart3D);

// Add data
chart.data = <?php echo json_encode($bar) ?>

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "sektor";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});


let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "SEKTOR";
valueAxis.title.fontWeight = "bold";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "nilainon";
series.dataFields.categoryX = "sektor";
series.name = "nilainon";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

columnTemplate.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

columnTemplate.adapter.add("stroke", function(stroke, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;

}); // end am4core.ready()
</script>
    </body>
</html>
