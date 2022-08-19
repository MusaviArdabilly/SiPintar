<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    </head>
    <style>
        #chartdiv {
            width: 100%;
            height: 280px;
        }
        #chartdiv2 {
            width: 100%;
            height: 280px;
        }
        #chartdiv3 {
            width: 100%;
            height: 280px;
        }
        #chartdiv5{
            width: 100%;
            height: 480px;
        }
    </style>

    <body style="background: rgba(202, 202, 202, 0.28);">
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
        <!-- #header -->

        <!-- start banner Area -->
        <div class="slider_area">
            <div class="shap_img_1 d-none d-lg-block">
                <img src="<?= base_url() ?>seogo/img/ilstrator/body_shap_1.png" alt="">
            </div>
            <div class="poly_img">
                <img src="<?= base_url() ?>seogo/img/ilstrator/poly.png" alt="">
            </div>
            <div class="bradcam_area">
                <div class="bradcam_shap">
                    <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>HOME</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service_area minus_padding">
                <div class="container">
                    <div class="card-body card-block" >
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="au-card m-b-30" >
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40" style="text-align:center">GRAFIK PERDAGANGAN <br><b>BPS</b><br> TAHUN <?= date('Y') ?></h3>
                                        <?php $abc = $bandingBpsE->nilai;$def = $bandingBpsI->nilai;$krg = $abc-$def; if($abc<$def){
                                            echo "<div style='text-align:center'><b>DEFISIT</b><br> ".number_format($krg,2)."</div>";
                                            }else{
                                                echo "<div style='text-align:center'><b>SURPLUS/DEFISIT</b><br>".number_format($krg,2)."</div>";
                                            }
                                            ?>
                                        <div id="chartdiv">
                                        </div> 
                                        <br>
                                        <div style="text-align:center">
                                             <button class="btn" id="ideksporBPS" style="background-color:#67b7dc;color: white">DETAIL EKSPOR</button>
                                            <button class="btn" id="idimporBPS"style="background-color:#6794dc;color: white">DETAIL IMPOR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card m-b-30" >
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40" style="text-align:center">GRAFIK PERDAGANGAN <br><b>Prov. JATIM</b> <br>TAHUN <?= date('Y') ?></h3>
                                        <?php $abc = $bandingE->nilai;$def = $bandingI->nilaiI;$krg = $abc-$def; if($abc<$def){
                                            echo "<div style='text-align:center'><b>DEFISIT/DEFISIT</b><br> ".number_format($krg,2)."</div>";
                                            }else{
                                                echo "<div style='text-align:center'><b>SURPLUS/DEFISIT</b><br>".number_format($krg,2)."</div>";
                                            }
                                            ?>
                                      
                                      
                                         <div id="chartdiv2"></div>
                                        <br>
                                        <div style="text-align:center">
                                            <button class="btn" id="ideksporPepi" style="background-color:#bb3c3c;color: white">DETAIL EKSPOR</button>
                                            <button class="btn" id="idimporPepi" style="background-color:#5d0505;color: white">DETAIL IMPOR</button>
                                        </div>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-3">
                                <div class="au-card m-b-30" >
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40" style="text-align:center">GRAFIK PERDAGANGAN <br><b>PUSDATIN</b><br> TAHUN <?= date('Y') ?></h3>
                                        <?php $abc = $bandingPusdaE->nilai;$def = $bandingPusdaI->nilai;$krg = $abc-$def; if($abc<$def){
                                            echo "<div style='text-align:center'><b>DEFISIT</b><br> ".number_format($krg,2)."</div>";
                                            }else{
                                                echo "<div style='text-align:center'><b>SURPLUS/DEFISIT</b><br>".number_format($krg,2)."</div>";
                                            }
                                            ?>
                                         <div id="chartdiv3"></div>
                                        <br>
                                        <div style="text-align:center">
                                            <button class="btn" id="ideksporPusda" style="background-color:#5156bb;color: white">DETAIL EKSPOR</button>
                                            <button class="btn" id="idimporPusda"style="background-color:#232555;color: white">DETAIL IMPOR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--BPS-->
        <div class="modal fade" id="eksporBPS" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">10 BESAR KOMODITI EKSPOR </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive m-b-40">
                            <table id="tableEksporBPS" class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>KOMODITAS</th>
                                        <th>NILAI ($)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="modal fade" id="imporBPS" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">10 BESAR KOMODITI IMPOR </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive m-b-40">
                            <table id="tableImporBPS" class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>KOMODITAS</th>
                                        <th>NILAI ($)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="eksporPepi" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">10 BESAR KOMODITI EKSPOR </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive m-b-40">
                            <table id="tableEksporPepi" class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>KOMODITAS</th>
                                        <th>NILAI ($)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="imporPepi" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">10 BESAR KOMODITI IMPOR </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive m-b-40">
                            <table id="tableImporPepi" class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>KOMODITAS</th>
                                        <th>NILAI ($)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="eksporPusda" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">10 BESAR KOMODITI EKSPOR </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive m-b-40">
                            <table id="tableEksporPusda" class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>KOMODITAS</th>
                                        <th>NILAI ($)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="imporPusda" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">10 BESAR KOMODITI IMPOR </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive m-b-40">
                            <table id="tableImporPusda" class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>KOMODITAS</th>
                                        <th>NILAI ($)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--END BPS-->
        <!-- Start brands Area -->
        <div class="case_study_area white_case_study">
            <div class="patrn_1 d-none d-lg-block">
                <img src="<?= base_url() ?>seogo/img/pattern/patrn_1.png" alt="">
            </div>
            <div class="patrn_2 d-none d-lg-block">
                <img src="<?= base_url() ?>seogo/img/pattern/patrn.png" alt="">
            </div>
            <div class="container">
                <div class="row posts">
                </div>
            </div>
        </div>
        <?php $this->load->view('template/footer') ?>
        <!-- End footer Area -->
        <?php $this->load->view('template/js') ?>
        <script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="http://www.amcharts.com/lib/3/pie.js"></script>
        <script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
        <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
       <script>
            $('#ideksporBPS').click(function () {
                 getDataEksporBPS();
            });
            $('#idimporBPS').click(function () {
                 getDataImporBPS();
            });
            $('#ideksporPepi').click(function () {
                 getDataEksporPepi();
            });
            $('#idimporPepi').click(function () {
                 getDataImporPepi();
            });
            $('#ideksporPusda').click(function () {
                 getDataEksporPusda();
            });
            $('#idimporPusda').click(function () {
                 getDataImporPusda();
            });
                            // AMCHART
                            am4core.ready(function () {
                                // Themes begin
                                am4core.useTheme(am4themes_material);
                                am4core.useTheme(am4themes_animated);
                                //                    am4core.Color
                                function am4themes_material(target) {
                                    if (target instanceof am4core.ColorSet) {
                                        target.list = [
                                            am4core.color("#67b7dc"),
                                            am4core.color("#6794dc")
                                        ];
                                    }
                                }
                                // Themes end

                                var chart = am4core.create("chartdiv", am4charts.PieChart3D);

                                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                                chart.legend = new am4charts.Legend();

                                chart.data = <?php echo json_encode($pie1) ?>

                                chart.innerRadius = 40;
                                var series = chart.series.push(new am4charts.PieSeries3D());
                                series.dataFields.value = "nilai";
                                series.dataFields.category = "kategori";


                            }); // end am4core.ready()



                            // AMCHART
                            am4core.ready(function () {

                                // Themes begin
                                am4core.useTheme(am4themes_material);
                                am4core.useTheme(am4themes_animated);
                                // Themes end
                                function am4themes_material(target) {
                                    if (target instanceof am4core.ColorSet) {
                                        target.list = [
                                            am4core.color("#bb3c3c"),
                                            am4core.color("#5d0505")
                                        ];
                                    }
                                }
                                var chart = am4core.create("chartdiv2", am4charts.PieChart3D);
                                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                                chart.legend = new am4charts.Legend();

                                chart.data = <?php echo json_encode($pie2) ?>

                                chart.innerRadius = 40;

                                var series = chart.series.push(new am4charts.PieSeries3D());
                                series.dataFields.value = "nilai";
                                series.dataFields.category = "kategori";

                            }); // end am4core.ready()

                            // AMCHART
                            am4core.ready(function () {

                                // Themes begin
                                am4core.useTheme(am4themes_material);
                                am4core.useTheme(am4themes_animated);
                                // Themes end

                                function am4themes_material(target) {
                                    if (target instanceof am4core.ColorSet) {
                                        target.list = [
                                            am4core.color("#5156bb"),
                                            am4core.color("#232555")
                                        ];
                                    }
                                }
                                var chart = am4core.create("chartdiv3", am4charts.PieChart3D);
                                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                                chart.legend = new am4charts.Legend();

                                chart.data = <?php echo json_encode($pie3) ?>

                                chart.innerRadius = 30;

                                var series = chart.series.push(new am4charts.PieSeries3D());
                                series.dataFields.value = "nilai";
                                series.dataFields.category = "kategori";

                            }); // end am4core.ready()
                            
                        function getDataEksporBPS(){
                                 
                                    $('#eksporBPS').modal('show');
                                    var datatable = $('#tableEksporBPS').dataTable().api();
                                    datatable.clear();
                                    $.ajax({

                                        url: '<?= base_url() ?>index.php/Home_admin/geteksporBPS',
                                       
                                        dataType: 'html',
                                        type: 'post',
                                        success: function (data) {
                                            datatable.rows.add(JSON.parse(data));
                                            datatable.draw();
                                        }
                                    });
                                    
                        }
                        
                        function getDataImporBPS(){
                                 
                                    $('#imporBPS').modal('show');
                                    var datatable = $('#tableImporBPS').dataTable().api();
                                    datatable.clear();
                                    $.ajax({

                                        url: '<?= base_url() ?>index.php/Home_admin/getimporBPS',
                                       
                                        dataType: 'html',
                                        type: 'post',
                                        success: function (data) {
                                            datatable.rows.add(JSON.parse(data));
                                            datatable.draw();
                                        }
                                    });
                                    
                                }
                                    
                        function getDataEksporPepi(){
                                 
                                    $('#eksporPepi').modal('show');
                                    var datatable = $('#tableEksporPepi').dataTable().api();
                                    datatable.clear();
                                    $.ajax({

                                        url: '<?= base_url() ?>index.php/Home_admin/geteksporPepi',
                                       
                                        dataType: 'html',
                                        type: 'post',
                                        success: function (data) {
                                            datatable.rows.add(JSON.parse(data));
                                            datatable.draw();
                                        }
                                    });
                        }
                        
                        function getDataImporPepi(){
                                 
                                    $('#imporPepi').modal('show');
                                    var datatable = $('#tableImporPepi').dataTable().api();
                                    datatable.clear();
                                    $.ajax({

                                        url: '<?= base_url() ?>index.php/Home_admin/getimporPepi',
                                       
                                        dataType: 'html',
                                        type: 'post',
                                        success: function (data) {
                                            datatable.rows.add(JSON.parse(data));
                                            datatable.draw();
                                        }
                                    });
                         }
                         
                         function getDataEksporPusda(){
                                 
                                    $('#eksporPusda').modal('show');
                                    var datatable = $('#tableEksporPusda').dataTable().api();
                                    datatable.clear();
                                    $.ajax({

                                        url: '<?= base_url() ?>index.php/Home_admin/geteksporPusda',
                                       
                                        dataType: 'html',
                                        type: 'post',
                                        success: function (data) {
                                            datatable.rows.add(JSON.parse(data));
                                            datatable.draw();
                                        }
                                    });
                        }
                        
                        function getDataImporPusda(){
                                 
                                    $('#imporPusda').modal('show');
                                    var datatable = $('#tableImporPusda').dataTable().api();
                                    datatable.clear();
                                    $.ajax({

                                        url: '<?= base_url() ?>index.php/Home_admin/getimporPusda',
                                       
                                        dataType: 'html',
                                        type: 'post',
                                        success: function (data) {
                                            datatable.rows.add(JSON.parse(data));
                                            datatable.draw();
                                        }
                                    });
                         }
                                
                                   $('#tableEksporBPS').dataTable({
                                        dom: 'Bfrtip',
                                        responsive: true,
                                        "columnDefs": [
                                            {
                                                "targets": 0, //index of column starting from 0
                                                "data": "uraian_hs", //this name should exist in your JSON response
                                            },
                                            {
                                                "targets": 1, //index of column starting from 0
                                                "data": "nilai", //this name should exist in your JSON response
                                            }
                                        ]
                                    });
                                    $('#tableImporBPS').dataTable({
                                        dom: 'Bfrtip',
                                        responsive: true,
                                        "columnDefs": [
                                            {
                                                "targets": 0, //index of column starting from 0
                                                "data": "uraian_hs", //this name should exist in your JSON response
                                            },
                                            {
                                                "targets": 1, //index of column starting from 0
                                                "data": "nilai", //this name should exist in your JSON response
                                            }
                                        ]
                                    });
                                    
                                     $('#tableEksporPepi').dataTable({
                                        dom: 'Bfrtip',
                                        responsive: true,
                                        "columnDefs": [
                                            {
                                                "targets": 0, //index of column starting from 0
                                                "data": "komoditas", //this name should exist in your JSON response
                                            },
                                            {
                                                "targets": 1, //index of column starting from 0
                                                "data": "nilai", //this name should exist in your JSON response
                                            }
                                        ]
                                    });
                                    $('#tableImporPepi').dataTable({
                                        dom: 'Bfrtip',
                                        responsive: true,
                                        "columnDefs": [
                                            {
                                                "targets": 0, //index of column starting from 0
                                                "data": "komoditas", //this name should exist in your JSON response
                                            },
                                            {
                                                "targets": 1, //index of column starting from 0
                                                "data": "nilai", //this name should exist in your JSON response
                                            }
                                        ]
                                    });
                                    $('#tableEksporPusda').dataTable({
                                        dom: 'Bfrtip',
                                        responsive: true,
                                        "columnDefs": [
                                            {
                                                "targets": 0, //index of column starting from 0
                                                "data": "diskripsi_hs", //this name should exist in your JSON response
                                            },
                                            {
                                                "targets": 1, //index of column starting from 0
                                                "data": "nilai", //this name should exist in your JSON response
                                            }
                                        ]
                                    });
                                    $('#tableImporPusda').dataTable({
                                        dom: 'Bfrtip',
                                        responsive: true,
                                        "columnDefs": [
                                            {
                                                "targets": 0, //index of column starting from 0
                                                "data": "diskripsi_hs", //this name should exist in your JSON response
                                            },
                                            {
                                                "targets": 1, //index of column starting from 0
                                                "data": "nilai", //this name should exist in your JSON response
                                            }
                                        ]
                                    });
                                    
        </script>
    </body>
</html>
