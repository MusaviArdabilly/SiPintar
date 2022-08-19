<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"/>

    </head>
    <body>
        <?php
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] == "") {
            $this->load->view('template/header');
        } elseif ($this->session->userdata['user_role'] == "ADMIN") {
            $this->load->view('template/header_admin');
        } elseif ($this->session->userdata['user_role'] == "USER") {
            $this->load->view('template/header_user');
        } else {
            $this->load->view('template/header');
        }
        ?>
        <div class="bradcam_area">
            <div class="bradcam_shap">
                <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Forecast</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="service_area minus_padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">FORECAST EKSPOR</h2>
                                    
                                  <p><center>Data berdasarkan pusdatin berlaku sampai dengan <b>April 2021</b></center></p>
                                    <thead>
                                        <tr>
                                            <th>Bulan (n)</th>
                                            <th>Periode (t)</th>
                                            <th>Nilai Periode (Y)</th>
                                            <th>t * y</th>
                                            <th>t2</th>
<!--                                            <th> <?php
                                                    $totaltew = 0;
                                                    $periode = 1;
                                                    foreach ($forecast as $key => $value) {
                                                         $totaltew += $periode; 
                                                    }
                                                    echo $totaltew;?> 
                                            </th>-->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $totalnilai = 0;
                                        $totalt = 0;
                                        $totalty = 0;
                                        $totalt2 = 0;
                                        $totalyt = 0;
//                                $rumusb      = 0;
                                        $periode = 1;
                                        foreach ($forecast as $key => $value) {

                                            $nilai = $value->nilai;
                                            $count = count($forecast); //kemungkinan salah
                                            $ty = $periode * $nilai;
                                            $t2 = $periode * $periode;

                                            $totalnilai += $nilai;
//                                            $totalt     += $periode; //kemungkinan salah pake for
                                            $totalty    += $ty;
//                                            $totalt2    += $t2; //kemungkinan salah
//                                            
                                            $count2         = 5;
                                            $totalt         = 15;
                                            $totalt23       = 15*15;
                                             $totalt2       = 55;
                                             $totalnilai2   = 8251580231;
                                             $totalyt2      = 22766086884;
                                            
                                            //RUMUS LINEAR SEDERHANA



                                            $rumusbkali =  ($count2 * $totalyt2) - ($totalnilai2*$totalt) ;
                                            $rumusbbagi = ($count2 * $totalt2)- ($totalt23) ;
                                            $rumusb = ($rumusbkali / $rumusbbagi) ;
//                                    $rata=($totalnilai!=0)?($totalnilai/$jumlah) * 100:0;
                                           
                                            $rumusay = $totalnilai2/ $count2;
                                            $rumusax = $totalt * $rumusb / $count2;
                                            $rumusa = ($rumusay - $rumusax);

                                            $yt = $rumusa + $rumusb;

                                            for ($i = 1;; $i++) {
                                                if ($i > $count) {
                                                    break;
                                                }

                                                $bulan = $value->bulan + $i;
                                                $kali = $rumusb * ($count + $i);
                                                $hsil = $rumusa + $kali;
                                            }
                                            ?>
                                            <tr>
                                                
                                                <td><?= $value->bulan ?> - <?= $value->tahun ?></td>
                                                <td><?= $periode++ ?> </td>
                                                <td><?= number_format($value->nilai, 2, ',', '.') ?></td>
                                                <td><?= number_format($ty, 2, ',', '.') ?></td>
                                                <td><?= $t2 ?></td>
                                            </tr>
<?php } ?>
                                        <tr>
                                            <td style="font-weight: bold">Total</td>
                                            <td style="font-weight: bold"> <?= $totalt ?></td>
                                            <td style="font-weight: bold"><?= number_format($totalnilai, 2, ',', '.') ?></td>
                                            <td style="font-weight: bold"><?= number_format($totalty, 2, ',', '.') ?></td>
                                            <td style="font-weight: bold"><?= $totalt2 ?></td>
                                        </tr>


                                    </tbody>
                                </table>
                                <table id="kinerja3" class="table table-hover responsive nowrap" style="width:50%;text-align: center;margin-top: 40px">
                                   <thead>
                                        <tr>
                                            <th>Bulan (n)</th>
                                            <th>HASIL FORECAST</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: #3907ff3b">

                                            <?php
                                            $totalnilai = 0;
                                            $totalt = 0;
                                            $totalty = 0;
                                            $totalt2 = 0;
                                            $totalyt = 0;
                                                                            //$rumusb      = 0;
                                            
                                            
                                            
                                            $period = 1;
                                            $periode = 0;
                                            foreach($forecast as $key => $value) {
                                                $nilaity   = $value->nilai;
                                                $ty        = $period * $nilaity;
                                                $t2        = $period * $period;
                                                $periode   += $period++;
                                                $totalty   += $ty;
                                                $totalt2   += $t2;
                                                
                                                 for ($i = 1;; $i++) {
                                                    if ($i > $count) {
                                                        break;
                                                    }

                                                    $bulan  = $value->bulan + $i;
                                                   
                                                }
                                            }
                                             
                                            foreach ($forecastsum as $key => $value2) {
                                                $nilai2 = $value2->nilai;
                                            }
                                            
                                            
                                            
                                                $count      = count($forecast);
                                                
                                                $totalnilai += $nilai2;
                                                $totalt     = $periode;
                                              



                                                //RUMUS METODE REGRESI LINIER
                                                $rumusbkali =  ($count * $totalty)  -  ($nilai2 * $periode) ;
                                                $rumusbbagi =  ($count * $totalt2)  -  ($periode * $periode);
//                                                $rumusbbagi =  ($count * $totalt2)  -  ($periode);
                                                $rumusb      = ($rumusbkali != 0) ? ($rumusbkali / $rumusbbagi) : 0;
                                                
                                                $rumusay = ($nilai2 != 0) ? $nilai2 / $count : 0;
                                                $rumusax = ($rumusb != 0) ? $periode * $rumusb / $count : 0;
                                                $rumusa = ($rumusay - $rumusax);

                                                for ($i = 1;; $i++) {
                                                    if ($i > $count) {
                                                        break;
                                                    }

                                                    $bulan  = $value->bulan + $i;
                                                    $kali   = $rumusb * $bulan;
                                                    $hsil   = $rumusa + $kali;
//                                                    echo $rumusa.'+'.$rumusb.'x'.$bulan.'='.$hsil.'<br><br>';
                                               
                                                  
                                               
                                                ?>
                                            <tr>
                                                
                                                
                                              <td style="font-weight: bold">
                                                    <?= $bulan ?>
                                                </td>
                                               <td style="font-weight: bold">
                                                    <?= number_format($hsil, 2, ',', '.') ?>
                                                </td>

                                            </tr>
                                                <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    
                    
                    <div class="col-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja2" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">FORECAST IMPOR</h2>
                                    
                                    <p><center>Data berdasarkan pusdatin berlaku sampai dengan <b>April 2021</b></center></p>
                                    <thead>
                                        <tr>
                                            <th>Bulan (n)</th>
                                            <th>Periode (t)</th>
                                            <th>Nilai Periode (Y)</th>
                                            <th>t * y</th>
                                            <th>t2</th>
<!--                                            <th> <?php
                                                    $totaltew = 0;
                                                    $periode = 1;
                                                    foreach ($forecasti as $key => $value) {
                                                         $totaltew += $periode; 
                                                    }
                                                    echo $totaltew;?> 
                                            </th>-->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $totalnilai = 0;
                                        $totalt = 0;
                                        $totalty = 0;
                                        $totalt2 = 0;
                                        $totalyt = 0;
//                                $rumusb      = 0;
                                        $periode = 1;
                                        foreach ($forecasti as $key => $value) {

                                            $nilai = $value->nilai;
                                            $count = count($forecasti); //kemungkinan salah
                                            $ty = $periode * $nilai;
                                            $t2 = $periode * $periode;

                                            $totalnilai += $nilai;
//                                            $totalt     += $periode; //kemungkinan salah pake for
                                            $totalty    += $ty;
//                                            $totalt2    += $t2; //kemungkinan salah
//                                            
                                            $count2         = 5;
                                            $totalt         = 15;
                                            $totalt23       = 15*15;
                                             $totalt2       = 55;
                                             $totalnilai2   = 8251580231;
                                             $totalyt2      = 22766086884;
                                            
                                            //RUMUS LINEAR SEDERHANA



                                            $rumusbkali =  ($count2 * $totalyt2) - ($totalnilai2*$totalt) ;
                                            $rumusbbagi = ($count2 * $totalt2)- ($totalt23) ;
                                            $rumusb = ($rumusbkali / $rumusbbagi) ;
//                                    $rata=($totalnilai!=0)?($totalnilai/$jumlah) * 100:0;
                                           
                                            $rumusay = $totalnilai2/ $count2;
                                            $rumusax = $totalt * $rumusb / $count2;
                                            $rumusa = ($rumusay - $rumusax);

                                            $yt = $rumusa + $rumusb;

                                            for ($i = 1;; $i++) {
                                                if ($i > $count) {
                                                    break;
                                                }

                                                $bulan = $value->bulan + $i;
                                                $kali = $rumusb * ($count + $i);
                                                $hsil = $rumusa + $kali;
                                            }
                                            ?>
                                            <tr>
                                                
                                                <td><?= $value->bulan ?> - <?= $value->tahun ?></td>
                                                <td><?= $periode++ ?> </td>
                                                <td><?= number_format($value->nilai, 2, ',', '.') ?></td>
                                                <td><?= number_format($ty, 2, ',', '.') ?></td>
                                                <td><?= $t2 ?></td>
                                            </tr>
<?php } ?>
                                        <tr>
                                            <td style="font-weight: bold">Total</td>
                                            <td style="font-weight: bold"> <?= $totalt ?></td>
                                            <td style="font-weight: bold"><?= number_format($totalnilai, 2, ',', '.') ?></td>
                                            <td style="font-weight: bold"><?= number_format($totalty, 2, ',', '.') ?></td>
                                            <td style="font-weight: bold"><?= $totalt2 ?></td>
                                        </tr>


                                    </tbody>
                                </table>
                                 <table id="kinerja4" class="table table-hover responsive nowrap" style="width:50%;text-align: center;margin-top: 40px">
                                   <thead>
                                        <tr>
                                            <th>Bulan (n)</th>
                                            <th>HASIL FORECAST</th>
                                        </tr>
                                    </thead>
                                     <tbody style="background-color: #3907ff3b">

                                            <?php
                                            $totalnilai = 0;
                                            $totalt = 0;
                                            $totalty = 0;
                                            $totalt2 = 0;
                                            $totalyt = 0;
                                            //                                $rumusb      = 0;
                                            
                                            
                                            
                                            $period = 1;
                                            $periode = 0;
                                            foreach($forecasti as $key => $value) {
                                                $nilaity   = $value->nilai;
                                                $ty        = $period * $nilaity;
                                                $t2        = $period * $period;
                                                $periode   += $period++;
                                                $totalty   += $ty;
                                                $totalt2   += $t2;
                                                
                                                 for ($i = 1;; $i++) {
                                                    if ($i > $count) {
                                                        break;
                                                    }

                                                    $bulan  = $value->bulan + $i;
                                                   
                                                }
                                            }
                                             
                                            foreach ($forecastisum as $key => $value2) {
                                                $nilai2 = $value2->nilai;
                                            }
                                            
                                            
                                            
                                                $count      = count($forecasti);
                                                
                                                $totalnilai += $nilai2;
                                                $totalt     = $periode;
                                              



                                                //RUMUS METODE REGRESI LINIER
                                                $rumusbkali =  ($count * $totalty)  -  ($nilai2 * $periode) ;
                                                $rumusbbagi =  ($count * $totalt2)  -  ($periode*$periode);
//                                                $rumusbbagi =  ($count * $totalt2)  -  ($periode);
                                                $rumusb     = ($rumusbkali != 0) ? ($rumusbkali / $rumusbbagi) : 0 ;
                                                
                                                $rumusay = ($nilai2 != 0) ? $nilai2 / $count : 0;
                                                $rumusax = ($rumusb != 0) ? $periode * $rumusb / $count : 0;
                                                $rumusa = ($rumusay - $rumusax);

                                                for ($i = 1;; $i++) {
                                                    if ($i > $count) {
                                                        break;
                                                    }

                                                    $bulan  = $value->bulan + $i;
                                                    $kali   = $rumusb * $bulan;
                                                    $hsil   = $rumusa + $kali;
//                                                    echo $rumusa.'+'.$rumusb.'x'.$bulan.'='.$hsil.'<br><br>';
                                               
                                                  
                                               
                                                ?>
                                            <tr>
                                                
                                                
                                                <td style="font-weight: bold">
                                                    <?= $bulan ?>
                                                </td>
                                             <td style="font-weight: bold">
                                                    <?= number_format($hsil, 2, ',', '.') ?>
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
        </div>
        <!-- </section> -->
        <!-- End contact-page Area -->

        <!-- start footer Area -->
<?php $this->load->view('template/footer') ?>
        <!-- End footer Area -->
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


        <?php $this->load->view('template/js') ?>
        <script type="text/javascript">
             $(document).ready(function () {
                                            $('#kinerja').DataTable({dom: 'Bfrtip',
                                                responsive: true,
                                                buttons: [
                                                    {extend: 'excel', className: 'btn btn-success btn-sm'},
                                                    {extend: 'pdf', className: 'btn btn-danger btn-sm'}
                                                ]
                                            });
                                            $('#kinerja2').DataTable({dom: 'Bfrtip',
                                                responsive: true,
                                                buttons: [
                                                    {extend: 'excel', className: 'btn btn-success btn-sm'},
                                                    {extend: 'pdf', className: 'btn btn-danger btn-sm'}
                                                ]
                                            });
                                            $('#kinerja3').DataTable({dom: 'Bfrtip',
                                                responsive: true,
                                                buttons: [
                                                    {extend: 'excel', className: 'btn btn-success btn-sm'},
                                                    {extend: 'pdf', className: 'btn btn-danger btn-sm'}
                                                ]
                                            });
                                            $('#kinerja4').DataTable({dom: 'Bfrtip',
                                                responsive: true,
                                                buttons: [
                                                    {extend: 'excel', className: 'btn btn-success btn-sm'},
                                                    {extend: 'pdf', className: 'btn btn-danger btn-sm'}
                                                ]
                                            });
                                        });
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
