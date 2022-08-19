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
        
        <div class="bradcam_area">
                <div class="bradcam_shap">
                    <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>Hasil Transaksi Kontak Dagang</h3>
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
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/Agenda/updateAgenda" method="post">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <select class="common-input form-control" name="nama_agenda">
                                        <?php foreach ($agenda as $key => $value){?>
                                        <option value="<?=$value->id?>|<?=$value->nama_agenda?>"><?=$value->nama_agenda?></option>
                                        <?php }?>
                                    </select>
                                   </div>
                                <div class="col-lg-6 form-group">
                                   <input name="nilai" placeholder="Nilai Transaksi" class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-12">
                                    <button class="genric-btn primary" style="float: right;">Simpan Nilai</button>
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
                                            <th>Kota</th>
                                            <th>Nilai Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($agendanotnull as $key => $value){?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?= $value->nama_agenda ?></td>
                                            <td><?= $value->tgl_mulai ?></td>
                                            <td><?= $value->tgl_selesai ?></td>
                                            <td><?= $value->lokasi_agenda ?></td>
                                            <td><?= $value->nama_kota?></td>
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
        <script type="text/javascript">
            $("#txtTahun1").datepicker({
                format: "dd-mm-yyyy",
                viewMode: "date",
                minViewMode: "date"
            });
        </script>
    </body>
</html>
