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
        <!-- banner -->
           <div class="bradcam_area">
                   <div class="bradcam_shap">
                       <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                   </div>
                   <div class="container">
                       <div class="row">
                           <div class="col-xl-12">
                               <div class="bradcam_text text-center">
                                   <h3>Rencana Agenda Promosi Luar Negeri</h3>
<!--                                   <nav class="brad_cam_lists">
                                       <ul class="breadcrumb">
                                           <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php">Home</a></li>
                                           <li class="breadcrumb-item active" aria-current="page">Agenda</li>
                                         </ul>
                                   </nav>-->
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

                    <div class="col-lg-12">
                        <form class="form-area contact-form text-right"  action="<?= base_url() ?>index.php/I_agenda/inputAgendaLuar" method="post">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <!--<label>Nama </label>-->
                                    <input name="nm_agenda" placeholder="Nama Agenda"  class="common-input mb-20 form-control" required="" type="text">

                                    <input name="tgl_mulai" placeholder="Tanggal Mulai Agenda"  id="txtTahun1" autocomplete="off"class="common-input mb-20 form-control" required="" type="text">
                                    <input name="tgl_selesai" placeholder="Tanggal Selesai Agenda"  id="txtTahun2" autocomplete="off"class="common-input mb-20 form-control" required="" type="text">

                                                                                <!--<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">-->
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input name="nm_kota" placeholder="Nama Negara" class="common-input mb-20 form-control" required="" type="text">
                                    <input name="lksi_agenda" placeholder="Lokasi Agenda" class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <h4>Surat Penawaran</h4>
                                    <input type="file" class="common-input mb-20 form-control" name="suratpenawaran">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <h4>Brosur</h4>
                                    <input type="file" class="common-input mb-20 form-control" name="brosur">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <h4>Foto Lokasi </h4>
                                    <input type="file" class="common-input mb-20 form-control" name="foto_lokasi">
                                </div>
                                
                                
                                <div class="col-lg-6">
                                    <button class="genric-btn primary" style="float: right;margin-top: 45px;">Simpan Agenda</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-12" style="padding-top: 50px">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA AGENDA</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Agenda</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Lokasi</th>
                                            <th>UMKM</th>
                                            <th>Negara</th>
                                            <!--<th>Nilai Transaksi</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($agendanull as $key => $value){?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?= $value->nama_agenda ?></td>
                                            <td><?= $value->tgl_mulai ?></td>
                                            <td><?= $value->tgl_selesai ?></td>
                                            <td><?= $value->lokasi_agenda ?></td>
                                            <td>  
                                                 <?php foreach ($agendanulldetail as $detail => $value2 ){ 
                                                    if($value2->id_agenda==$value->id){?>
                                                       <?= $value2->umkm. ' ;' ?>
                                                 <?php }}?>
                                             </td>
                                            <td><?= $value->nama_kota?></td>
                                            <!--<td><?= $value->nilai ?></td>-->
                                            <td>
                                                <button class="btn btn-success btn-sm"><a style="color:white" href="<?= base_url()?>index.php/I_agenda/addUmkmLN/<?=$value->id?>">TAMBAH UMKM</a></button>
                                                <button class="btn btn-warning btn-sm"><a href="<?= base_url()?>index.php/I_agenda/editLN/<?=$value->id?>">EDIT</a></button>
                                                <button class="btn btn-danger btn-sm" data-target="#deletemodal" data-toggle="modal" data-id="<?= $value->id ?>">DELETE AGENDA</button>
                                            </td>
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
         <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
        <form method="POST" action="<?= base_url() ?>index.php/I_agenda/deleteAgendaLN">
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
                        <button class="btn btn-danger btn-sm">Delete User</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <!-- End contact-page Area -->

        <?php $this->load->view('template/footer') ?>
        <?php $this->load->view('template/js') ?>
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
             $(document).ready( function () {
                $('#kinerja').DataTable();
            } );
            $("#txtTahun1").datepicker({
                format: "yyyy-mm-dd",
                viewMode: "date",
                minViewMode: "date"
            });
            $("#txtTahun2").datepicker({
                format: "yyyy-mm-dd",
                viewMode: "date",
                minViewMode: "date"
            });
            
            $('#deletemodal').on('shown.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            $('#idDelete').val(id);
            });
        </script>
    </body>
</html>
