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
                                <h3>Entri Data Rencana Kerja PI</h3>
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
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/E_renc_kerja/updateData" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4 form-group">
                                    <input name="id" value="<?=$edit_renc_kerja->id?>" type="hidden">
                                    <input name="renc_kerja" value="<?=$edit_renc_kerja->rencana_agenda?>" placeholder="RENCANA AGENDA" autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="realisasi_kerja" value="<?=$edit_renc_kerja->realisasi_agenda?>" placeholder="REALISASI AGENDA "   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="tglagenda_kerja" value="<?=$edit_renc_kerja->tgl_agenda?>" id="txtTahun1" placeholder="TANGGAL AGENDA"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="tglmulai_kerja" value="<?=$edit_renc_kerja->tgl_mulai?>" id="txtTahun2" placeholder="TANGGAL MULAI"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="tglakhir_kerja" value="<?=$edit_renc_kerja->tgl_akhir?>" id="txtTahun3" placeholder="TANGGAL BERAKHIR"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="hsil_kerja" value="<?=$edit_renc_kerja->hasil_agenda?>" placeholder="HASIL AGENDA"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-8 form-group">
                                    <input name="ket_kerja"value="<?=$edit_renc_kerja->keterangan?>" placeholder="KETERANGAN"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                 <div class="col-lg-6 form-group">
                                    <h6 style="text-align: left">FOTO HASIL KEGIATAN</h6>
                                    <p style="text-align:left"><?= ($edit_renc_kerja->filefoto != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                     <input type="file" name="filefoto"  class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-6 form-group">
                                    <h6 style="text-align: left">FILE LAPORAN</h6>
                                    <p style="text-align:left"><?= ($edit_renc_kerja->filelaporan != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                    <input type="file" name="filelaporan"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 offset-8">
                                    <button class="genric-btn primary"  onclick="myFunction()" style="float: right;">Edit Data</button>
                                </div>
                            </div>
                        </form>
                    </div>

<!--                    <div class="col-lg-12" style="padding-top: 50px">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA RENCANA KERJA</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Rencana Agenda</th>
                                            <th>Realisasi Agenda</th>
                                            <th>Hasil Agenda</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($renc_kerja as $key => $value){?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?= $value->rencana_agenda ?></td>
                                            <td><?= $value->realisasi_agenda ?></td>
                                            <td><?= $value->hasil_agenda ?></td>
                                            <td><?= $value->keterangan ?></td>
                                            <td style="text-align:center">
                                                    <button class="btn btn-warning btn-sm"><a href="<?= base_url()?>index.php/E_renc_kerja/edit/<?=$value->id?>">EDIT</a></button>

                                                    <button class="btn btn-danger btn-sm" data-target="#deletemodal" data-toggle="modal" data-id="<?= $value->id ?>">DELETE RENCANA KERJA</button>
                                                </td>
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
        <!-- End contact-page Area -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
            <form method="POST" action="<?= base_url() ?>index.php/E_renc_kerja/deleteRencKerja">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 style="text-align: center">Delete Agenda Dalam Negeri</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="" id="idDelete">

                            <div class="col col-md-12" style="text-align: center;">
                                <h3>Apakah anda yakin akan menghapus agenda ini ???</h3><br>
                            </div>
                            <div class="col-12 col-md-12">
                                <!--<input type="hidden" name="password" value="user12345">-->
                            </div>
                        </div>

                        <br><br>
                        <div class="modal-footer" style="text-align: center;">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-danger btn-sm">Delete Rencana Kerja</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
                format: "dd - M - yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
             $("#txtTahun2").datepicker({
                format: "dd - M - yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
             $("#txtTahun3").datepicker({
                format: "dd - M - yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
            $('#deletemodal').on('shown.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                $('#idDelete').val(id);
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
