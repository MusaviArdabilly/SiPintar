<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
    </head>
    <style>
#chartdiv {
  width: 100%;
  height: 280px;
}
#Barchartdiv {
  width: 100%;
  height: 280px;
}

#BarNegaraEkspor {
  width: 100%;
  height: 280px;
}

#BarNegaraImpor {
  width: 100%;
  height: 280px;
}
#BarKomoditiEkspor {
  width: 100%;
  height: 280px;
}
#BarKomoditiImpor {
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
                            <h3>Neraca Perdagangan Jawa Timur</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End banner Area -->
        <div class="service_area minus_padding">
            <div class="container">
                <div class="card-body card-block" >
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner">
                                    <h3 class="title-2 m-b-40" style="text-align:center">NERACA DAGANG <br> <b>PROVINSI JATIM</b> <br> TAHUN  <?= $month->tahun?> <br><?= date('F', strtotime("early month"));?> - <?=$month->bln_akhir?></h3>
                                    <div id="chartdiv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner"> 
                                    <h3 class="title-2 m-b-40" style="text-align:center">NERACA DAGANG <br> <b>PROVINSI JATIM</b> <br> TAHUN <?= $month->tahun?> <br><?= date('F', strtotime("early month"));?> - <?=$month->bln_akhir?></h3>
                                    <div id="Barchartdiv"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner"> 
                                    <h3 class="title-2 m-b-40" style="text-align:center">10 NEGARA TUJUAN EKSPOR TAHUN <?= $month->tahun?> <br><?= date('F', strtotime("early month"));?> - <?=$month->bln_akhir?></h3>
                                    <h6  class="title-2 m-b-40" style="color:#f95e13;text-align:center">Data Prov. Jatim</h6>
                                     <div id="BarNegaraEkspor"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner"> 
                                    <h3 class="title-2 m-b-40" style="text-align:center">10 NEGARA ASAL IMPOR TAHUN <?= $monthI->tahun?> <br><?= date('F', strtotime("early month"));?> - <?=$monthI->bln_akhir?></h3>
                                    <h6  class="title-2 m-b-40" style="color:#f95e13;text-align:center">Data Prov. Jatim</h6>
                                    <div id="BarNegaraImpor"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner"> 
                                    <h3 class="title-2 m-b-40" style="text-align:center">10 KOMODITI EKSPOR TAHUN <?= $month->tahun?> <br><?= date('F', strtotime("early month"));?> - <?=$month->bln_akhir?></h3>
                                    <h6  class="title-2 m-b-40" style="color:#f95e13;text-align:center">Data Prov. Jatim</h6>
                                    <div id="BarKomoditiEkspor"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="au-card m-b-30" >
                                <div class="au-card-inner"> 
                                    <h3 class="title-2 m-b-40" style="text-align:center">10 KOMODITI IMPOR TAHUN <?= $monthI->tahun?> <br><?= date('F', strtotime("early month"));?> - <?=$monthI->bln_akhir?></h3>
                                    <h6  class="title-2 m-b-40" style="color:#f95e13;text-align:center">Data Prov. Jatim</h6>
                                    <div id="BarKomoditiImpor"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
            <!-- start footer Area -->
            <?php $this->load->view('template/footer') ?>
            <!-- End footer Area -->
            <?php $this->load->view('template/js') ?>
            <script>

                // AMCHART
                am4core.ready(function () {

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
                    series.dataFields.value = "nilai";
                    series.dataFields.category = "kategori";

                }); // end am4core.ready()
            </script>
            <!-- BAR Chart code -->
            <script>
                am4core.ready(function () {

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

                    // Create chart instance
                    var chart = am4core.create("Barchartdiv", am4charts.XYChart3D);

                    // Add data
                    chart.data = <?php echo json_encode($bar) ?>

                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "kategori";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;



                    let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.title.text = "NILAI";
                    valueAxis.title.fontWeight = "bold";
                    
                    valueAxis.min = 0;
                    valueAxis.max = 10000000000;

                    // Create series
                    var series = chart.series.push(new am4charts.ColumnSeries3D());
                    series.dataFields.valueY = "nilai";
                    series.dataFields.categoryX = "kategori";
                    series.name = "nilai";
                    series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
                    series.columns.template.fillOpacity = .8;

                    var columnTemplate = series.columns.template;
                    columnTemplate.strokeWidth = 2;
                    columnTemplate.strokeOpacity = 1;
                    columnTemplate.stroke = am4core.color("#FFFFFF");

                    columnTemplate.adapter.add("fill", function (fill, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    columnTemplate.adapter.add("stroke", function (stroke, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    chart.cursor = new am4charts.XYCursor();
                    chart.cursor.lineX.strokeOpacity = 0;
                    chart.cursor.lineY.strokeOpacity = 0;

                }); // end am4core.ready()
            </script>
            
             <!-- BAR Chart code -->
            <script>
                am4core.ready(function () {

                    // Themes begin
                    am4core.useTheme(am4themes_material);
                    am4core.useTheme(am4themes_animated);
                    function am4themes_material(target) {
                                    if (target instanceof am4core.ColorSet) {
                                        target.list = [
                                            am4core.color("#f44336"),
                                            am4core.color("#e91e63"),
                                            
                                            am4core.color("#9c27b0"),
                                            am4core.color("#673ab7"),
                                            
                                            am4core.color("#3f51b5"),
                                            am4core.color("#2196f3"),
                                            
                                            am4core.color("#03a9f4"),
                                            am4core.color("#00bcd4"),
                                            
                                            am4core.color("#009688"),
                                            am4core.color("#4caf50"),
                                            
                                        ];
                                    }
                                }
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("BarNegaraEkspor", am4charts.XYChart3D);

                    // Add data
                    chart.data = <?php echo json_encode($barNegaraEkspor) ?>

                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "negara";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;
                    
                    categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                      if (target.dataItem && target.dataItem.index & 2 == 2) {
                        return dy + 25;
                      }
                      return dy;
                    });



                    let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.title.text = "NILAI";
                    valueAxis.title.fontWeight = "bold";

                    // Create series
                    var series = chart.series.push(new am4charts.ColumnSeries3D());
                    series.dataFields.valueY = "nilai";
                    series.dataFields.categoryX = "negara";
                    series.name = "nilai";
                    series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
                    series.columns.template.fillOpacity = .8;

                    var columnTemplate = series.columns.template;
                    columnTemplate.strokeWidth = 2;
                    columnTemplate.strokeOpacity = 1;
                    columnTemplate.stroke = am4core.color("#FFFFFF");
                    
                        

                    columnTemplate.adapter.add("fill", function (fill, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    columnTemplate.adapter.add("stroke", function (stroke, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    chart.cursor = new am4charts.XYCursor();
                    chart.cursor.lineX.strokeOpacity = 0;
                    chart.cursor.lineY.strokeOpacity = 0;

                }); // end am4core.ready()
            </script>
            
             <!-- BAR Chart code -->
            <script>
                am4core.ready(function () {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("BarNegaraImpor", am4charts.XYChart3D);

                    // Add data
                    chart.data = <?php echo json_encode($barNegaraImpor) ?>

                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "negara";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;

                    categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                      if (target.dataItem && target.dataItem.index & 2 == 2) {
                        return dy + 25;
                      }
                      return dy;
                    });



                    let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.title.text = "NILAI";
                    valueAxis.title.fontWeight = "bold";

                    // Create series
                    var series = chart.series.push(new am4charts.ColumnSeries3D());
                    series.dataFields.valueY = "nilai";
                    series.dataFields.categoryX = "negara";
                    series.name = "nilai";
                    series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
                    series.columns.template.fillOpacity = .8;

                    var columnTemplate = series.columns.template;
                    columnTemplate.strokeWidth = 2;
                    columnTemplate.strokeOpacity = 1;
                    columnTemplate.stroke = am4core.color("#FFFFFF");

                    columnTemplate.adapter.add("fill", function (fill, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    columnTemplate.adapter.add("stroke", function (stroke, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    chart.cursor = new am4charts.XYCursor();
                    chart.cursor.lineX.strokeOpacity = 0;
                    chart.cursor.lineY.strokeOpacity = 0;

                }); // end am4core.ready()
            </script>
            <script>
                am4core.ready(function () {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("BarKomoditiEkspor", am4charts.XYChart3D);

                    // Add data
                    chart.data = <?php echo json_encode($barKomoditiEkspor) ?>

                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "kode_hs";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;
                     categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                      if (target.dataItem && target.dataItem.index & 2 == 2) {
                        return dy + 25;
                      }
                      return dy;
                    });


                    let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.title.text = "NILAI";
                    valueAxis.title.fontWeight = "bold";

                    // Create series
                    var series = chart.series.push(new am4charts.ColumnSeries3D());
                    series.dataFields.valueY = "nilai";
                    series.dataFields.categoryX = "kode_hs";
                    series.dataFields.categoryY = 'kode_hs';
                    series.name = "nilai";
                    series.tooltipText = "{categoryY}: [bold]{valueY}[/]";
                    series.columns.template.fillOpacity = .8;

                    var columnTemplate = series.columns.template;
                    columnTemplate.strokeWidth = 2;
                    columnTemplate.strokeOpacity = 1;
                    columnTemplate.stroke = am4core.color("#FFFFFF");

                    columnTemplate.adapter.add("fill", function (fill, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    columnTemplate.adapter.add("stroke", function (stroke, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    chart.cursor = new am4charts.XYCursor();
                    chart.cursor.lineX.strokeOpacity = 0;
                    chart.cursor.lineY.strokeOpacity = 0;

                }); // end am4core.ready()
            </script>
            
             <script>
                am4core.ready(function () {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("BarKomoditiImpor", am4charts.XYChart3D);

                    // Add data
                    chart.data = <?php echo json_encode($barKomoditiImpor) ?>

                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "kode_hs";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;
                     categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                      if (target.dataItem && target.dataItem.index & 2 == 2) {
                        return dy + 25;
                      }
                      return dy;
                    });


                    let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.title.text = "NILAI";
                    valueAxis.title.fontWeight = "bold";
              
                    // Create series
                    var series = chart.series.push(new am4charts.ColumnSeries3D());
                    series.dataFields.valueY = "nilai";
                    series.dataFields.categoryX = "kode_hs";
                    series.dataFields.categoryY = 'kode_hs';
                    series.name = "nilai";
                    series.tooltipText = "{categoryY}: [bold]{valueY}[/]";
                    series.columns.template.fillOpacity = .8;

                    var columnTemplate = series.columns.template;
                    columnTemplate.strokeWidth = 2;
                    columnTemplate.strokeOpacity = 1;
                    columnTemplate.stroke = am4core.color("#FFFFFF");

                    columnTemplate.adapter.add("fill", function (fill, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    columnTemplate.adapter.add("stroke", function (stroke, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    })

                    chart.cursor = new am4charts.XYCursor();
                    chart.cursor.lineX.strokeOpacity = 0;
                    chart.cursor.lineY.strokeOpacity = 0;

                }); // end am4core.ready()
            </script>
    </body>
</html>
