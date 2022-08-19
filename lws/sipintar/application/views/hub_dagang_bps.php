<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"/>

        <!-- select search -->
        <link href="<?= base_url() ?>assets/vendor/select-search/select-search.min.css" rel="stylesheet">

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

        <div class="shap_big_2 d-none d-lg-block Another_shap_big">
            <img src="<?= base_url() ?>seogo/img/ilstrator/big.png" alt="">
        </div>
        <!-- banner -->
        <div class="bradcam_area" style="padding-top: 100px;
             padding-bottom: 28px;">
            <div class="bradcam_shap">
                <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Hubungan Dagang Data BPS</h3>
                            <nav class="brad_cam_lists">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kinerja</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end banner -->

        <!-- Start contact-page Area -->
        <div class="service_area minus_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" style="background:white">


                        <div class="box">
                            <div class="box-header">
                                FILTER
                            </div>
                            <br><br>
                            <select class="form-control select2" id="selectnegara" name="selectnegara">
                                <option>-- Pilih Negara --</option>
                                <?php foreach ($negara as $key => $value) { ?>
                                    <option value="<?= $value->nama_negara ?>"><?= $value->nama_negara ?></option>
                                <?php } ?>
                            </select> <br><br>
                            <button class="btn btn-secondary" id="btnTampilkan">SEARCH</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">Neraca Perdagangan Jawa Timur - <label id="lblBlNegara" style="color: red;font-size: 36px;text-transform: uppercase;"></label> </h2>

                                    <h6 style="text-align:right">Nilai : US$</h6>
                                    <p>Data berdasarkan pusdatin</p>
                                    <thead>
                                        <tr>
                                            <th>TAHUN</th>
                                            <th>EKSPOR</th>
                                            <th>IMPOR</th>
                                            <th>SURPLUS / DEFISIT</th>
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

            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="ekspor" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">Perkembangan Total Ekspor Non Migas Jawa Timur - <label id="lblBlNegara2"  style="color: red;font-size: 36px;text-transform: uppercase;"></label> </h2>

                                    <h6 style="text-align:right">Nilai : US$</h6>
                                    <p>Data berdasarkan pusdatin</p>
                                    <thead>
                                        <tr>
                                            <th>TAHUN</th>
                                            <th>TOTAL EKS JATIM</th>
                                            <th>EKS KE <label id="lblBlNegara3" style="color: red;font-size: 15px;text-transform: uppercase;"></label> </th>
                                            <th>PERTUMB(%)</th>
                                            <th>SHARE(%)</th>
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
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="impor" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">Perkembangan Impor Non Migas Jawa Timur - <label id="lblBlNegara4"  style="color: red;font-size: 36px;text-transform: uppercase;"></label> </h2>

                                    <h6 style="text-align:right">Nilai : US$</h6>
                                    <p>Data berdasarkan pusdatin</p>
                                    <thead>
                                        <tr>
                                            <th>TAHUN</th>
                                            <th>TOTAL IMP JATIM</th>
                                            <th>IMP DARI <label id="lblBlNegara5" style="color: red;font-size: 15px;text-transform: uppercase;"></label></th>
                                            <th>PERTUMB(%)</th>
                                            <th>SHARE(%)</th>
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
        </div>
        <!-- End contact-page Area -->

        <!-- start footer Area -->
        <?php $this->load->view('template/footer') ?>
        <!-- End footer Area -->
        <?php $this->load->view('template/js') ?>

<!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>-->
<!--        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
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




        <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/select-search/select-search.js"></script>
        <!-- Select2 js-->
   <!--    <script type="text/javascript" src="<?= base_url() ?>assets/js/select2.full.js"></script>
        Propeller Select2
       <script type="text/javascript" src="<?= base_url() ?>assets/js/pmd-select2.js"></script>-->

        <script type="text/javascript">
            $(document).ready(function () {
                $('#btnTampilkan');
            });
            $(function () {
                $('#btnTampilkan').click(function () {
                    var negara = $('#selectnegara').val();
                    $('#lblBlNegara').text(negara);
                    $('#lblBlNegara2').text(negara);
                    $('#lblBlNegara3').text(negara);
                    $('#lblBlNegara4').text(negara);
                    $('#lblBlNegara5').text(negara);
                    $('#lblBlNegara6').text(negara);
                    $('#lblBlNegara7').text(negara);

                    var datatable = $('#kinerja').dataTable().api();
                    datatable.clear();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/show/Hub_dagang_bps/getNegaraBps",
                        data: {
                            "negara": negara
                        },
                        dataType: "html",
                        success: function (data) {
                            datatable.rows.add(JSON.parse(data));
                            datatable.draw();
                        }
                    });


                    var datatableE = $('#ekspor').dataTable().api();
                    datatableE.clear();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/show/Hub_dagang_bps/getNerEksporBps",
                        data: {
                            "negara": negara
                        },
                        dataType: "html",
                        success: function (data) {
                            datatableE.rows.add(JSON.parse(data));
                            datatableE.draw();
                        }
                    });

                    var datatableI = $('#impor').dataTable().api();
                    datatableI.clear();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/show/Hub_dagang_bps/getNerImporBps",
                        data: {
                            "negara": negara
                        },
                        dataType: "html",
                        success: function (data) {
                            datatableI.rows.add(JSON.parse(data));
                            datatableI.draw();
                        }
                    });
                });
            });

            var datatable = $('#kinerja').DataTable({
                "columnDefs": [
                    {
                        "targets": 0, //index of column starting from 0
                        "data": "tahun",
                    },
                    {
                        "targets": 1, //index of column starting from 0
                        "data": "nilaiE", //this name should exist in your JSON response
                    },
                    {
                        "targets": 2, //index of column starting from 0
                        "data": "nilaiI", //this name should exist in your JSON response
                    },
                    {
                        "targets": 3, //index of column starting from 0
                        "data": "sur", //this name should exist in your JSON response
                    },
                ]
            });


            //hide error message
            $.fn.DataTable.ext.errMode = 'none';
            //end error message



            var datatableE = $('#ekspor').DataTable({
                "columnDefs": [
                    {
                        "targets": 0, //index of column starting from 0
                        "data": "tahun",
                    },
                    {
                        "targets": 1, //index of column starting from 0
                        "data": "nilai", //this name should exist in your JSON response
                    },
                    {
                        "targets": 2, //index of column starting from 0
                        "data": "nilaiE", //this name should exist in your JSON response
                    },
                    {
                        "targets": 3, //index of column starting from 0
                        "data": "pertumbuhan", //this name should exist in your JSON response
                    },
                    {"targets": 4, //index of column starting from 0
                        "data": "share", //this name should exist in your JSON response
                    }
                ]
            });
            var datatableI = $('#impor').DataTable({
                "columnDefs": [

                    {
                        "targets": 0, //index of column starting from 0
                        "data": "tahun",
                    },
                    {
                        "targets": 1, //index of column starting from 0
                        "data": "nilai", //this name should exist in your JSON response
                    },
                    {
                        "targets": 2, //index of column starting from 0
                        "data": "nilaiI", //this name should exist in your JSON response
                    },
                    {
                        "targets": 3, //index of column starting from 0
                        "data": "pertumbuhan", //this name should exist in your JSON response
                    },
                    {"targets": 4, //index of column starting from 0
                        "data": "share", //this name should exist in your JSON response
                    }

                ],

            });


            $(document).ready(function () {
//                $("#kinerja").DataTable({
//                    aaSorting: [],
//                    responsive: true,
//                     dom: 'Bfrtip',
//                buttons: [
//                    {extend: 'excel', className: 'btn btn-success btn-sm'},
//                    {extend: 'pdf', className: 'btn btn-danger btn-sm'}
//                ],
//                    columnDefs: [
//                        {
//                            responsivePriority: 1,
//                            targets: 0
//                        },
//                        {
//                            responsivePriority: 2,
//                            targets: -1
//                        }
//                    ]
//                });
//
                $("#sektor").DataTable({
                    aaSorting: [],
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {extend: 'excel', className: 'btn btn-success btn-sm'},
                        {extend: 'pdf', className: 'btn btn-danger btn-sm'}
                    ],
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ]
                });

//                $("#komoditi").DataTable({
//                    aaSorting: [],
//                    responsive: true,
//                     dom: 'Bfrtip',
//                buttons: [
//                    {extend: 'excel', className: 'btn btn-success btn-sm'},
//                    {extend: 'pdf', className: 'btn btn-danger btn-sm'}
//                ],
//                    columnDefs: [
//                        {
//                            responsivePriority: 1,
//                            targets: 0
//                        },
//                        {
//                            responsivePriority: 2,
//                            targets: -1
//                        }
//                    ]
//                });
//
//                $("#negara").DataTable({
//                    aaSorting: [],
//                    responsive: true,
//                     dom: 'Bfrtip',
//                buttons: [
//                    {extend: 'excel', className: 'btn btn-success btn-sm'},
//                    {extend: 'pdf', className: 'btn btn-danger btn-sm'}
//                ],
//                    columnDefs: [
//                        {
//                            responsivePriority: 1,
//                            targets: 0
//                        },
//                        {
//                            responsivePriority: 2,
//                            targets: -1
//                        }
//                    ]
//                });

                $(".dataTables_filter input")
                        .attr("placeholder", "Search here...")
                        .css({
                            width: "300px",
                            display: "inline-block"
                        });

                $('[data-toggle="tooltip"]').tooltip();
            });
            //SELECT SEARCH
            $('.select2').select2({
                templateResult: function (data) {
                    // We only really care if there is an element to pull classes from
                    if (!data.element) {
                        return data.text;
                    }

                    var $element = $(data.element);

                    var $wrapper = $('<span></span>');
                    $wrapper.addClass($element[0].className);

                    $wrapper.text(data.text);

                    return $wrapper;
                }
            });

        </script>
    </body>
</html>
