<!DOCTYPE html>
<html lang="zxx" class="no-js">
     <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"/>


        <!-- <style>

            body {
                background: #f7f7f7;
            }

            .table {
                border-spacing: 0 0.85rem !important;
            }

            .table .dropdown {

                display: inline-block;
            }

            .table td,
            .table th {
                vertical-align: middle;
                margin-bottom: 10px;
                border: none;
            }

            .table thead tr,
            .table thead th {
                border: none;
                font-size: 12px;
                letter-spacing: 1px;
                text-transform: uppercase;
                background: transparent;
            }

            .table td {
                background: #fff;
            }

            .table td:first-child {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            .table td:last-child {
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
            }

            .avatar {
                width: 2.75rem;
                height: 2.75rem;
                line-height: 3rem;
                border-radius: 50%;
                display: inline-block;
                background: transparent;
                position: relative;
                text-align: center;
                color: #868e96;
                font-weight: 700;
                vertical-align: bottom;
                font-size: 1rem;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .avatar-sm {
                width: 2.5rem;
                height: 2.5rem;
                font-size: 0.83333rem;
                line-height: 1.5;
            }

            .avatar-img {
                width: 100%;
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
            }

            .avatar-blue {
                background-color: #c8d9f1;
                color: #467fcf;
            }

            table.dataTable.dtr-inline.collapsed
            > tbody
            > tr[role="row"]
            > td:first-child:before,
            table.dataTable.dtr-inline.collapsed
            > tbody
            > tr[role="row"]
            > th:first-child:before {
                top: 28px;
                left: 14px;
                border: none;
                box-shadow: none;
            }

            table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child,
            table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child {
                padding-left: 48px;
            }

            table.dataTable > tbody > tr.child ul.dtr-details {
                width: 100%;
            }

            table.dataTable > tbody > tr.child span.dtr-title {
                min-width: 50%;
            }

            table.dataTable.dtr-inline.collapsed > tbody > tr > td.child,
            table.dataTable.dtr-inline.collapsed > tbody > tr > th.child,
            table.dataTable.dtr-inline.collapsed > tbody > tr > td.dataTables_empty {
                padding: 0.75rem 1rem 0.125rem;
            }

            div.dataTables_wrapper div.dataTables_length label,
            div.dataTables_wrapper div.dataTables_filter label {
                margin-bottom: 0;
            }

            @media (max-width: 767px) {
                div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                    -ms-flex-pack: center !important;
                    justify-content: center !important;
                    margin-top: 1rem;
                }
            }

            .btn-icon {
                background: #fff;
            }
            .btn-icon .bx {
                font-size: 20px;
            }

            .btn .bx {
                vertical-align: middle;
                font-size: 20px;
            }

            .dropdown-menu {
                padding: 0.25rem 0;
            }

            .dropdown-item {
                padding: 0.5rem 1rem;
            }

            .badge {
                padding: 0.5em 0.75em;
            }

            .badge-success-alt {
                background-color: #d7f2c2;
                color: #7bd235;
            }

            .table a {
                color: #212529;
            }

            .table a:hover,
            .table a:focus {
                text-decoration: none;
            }

            table.dataTable {
                margin-top: 12px !important;
            }

            .icon > .bx {
                display: block;
                min-width: 1.5em;
                min-height: 1.5em;
                text-align: center;
                font-size: 1.0625rem;
            }

            .btn {
                font-size: 0.9375rem;
                font-weight: 500;
                padding: 0.5rem 0.75rem;
            }

            .avatar-blue {
                background-color: #c8d9f1;
                color: #467fcf;
            }

            .avatar-pink {
                background-color: #fcd3e1;
                color: #f66d9b;
            }
        </style> -->
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
        <div class="bradcam_area">
                <div class="bradcam_shap">
                    <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>Inputan Data Impor Non Migas	</h3>
                                <!--<nav class="brad_cam_lists">-->
                                <!--    <ul class="breadcrumb">-->
                                <!--        <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php">Home</a></li>-->
                                <!--        <li class="breadcrumb-item active" aria-current="page">Agenda</li>-->
                                <!--      </ul>-->
                                <!--</nav>-->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- End banner Area -->

        <!-- Start contact-page Area -->
        <div class="service_area minus_padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/Data_impor/inputSektor" method="post">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <select class="common-input mb-20 form-control" name="sektor">
                                        <option>BAHAN BAKU</option>
                                         <option>BARANG MODAL</option>
                                          <option>BARANG KONSUMSI</option>
                                    </select>
                                     <!--<input name="" placeholder="SEKTOR NON MIGAS"  class="common-input mb-20 form-control" required="" type="text">-->
                                </div>
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6 form-group">
                                     <input type="hidden" name="migas" value="NONMIGAS">
                                     <input name="bulan_sektor" placeholder="TANGGAL NON MIGAS" id="txtTahun1" autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input name="nilai" placeholder="NILAI NON MIGAS"  step="0.01" autocomplete="off"  class="common-input mb-20 form-control" required="" type="number">
                                </div>
                                <div class="col-lg-12">
                                    <button class="genric-btn primary"  onclick="myFunction()" style="float: right;">Simpan Agenda</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12" style="padding-top: 50px">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA IMPOR NON MIGAS</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Sektor</th>
                                            <th>Bulan</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($non_migas as $key => $value){?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?= $value->kategori ?></td>
                                            <td><?= $value->sektor ?></td>
                                            <td><?= $value->bulan ?></td>
                                            <td><?= $value->nilai ?></td>
                                        </tr>
                                        <?php } ?>
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
        <script type="text/javascript">
            $("#txtTahun1").datepicker({
                format: "M - yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
            $(document).ready(function () {
                                                $("#kinerja").DataTable({
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
                                            });
        </script>

        <script>
        function myFunction() {
          alert("Data anda telah ditambahkan, Terimakasih !!! :)");
        }
        </script>
    </body>
</html>
