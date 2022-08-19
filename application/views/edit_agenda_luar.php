<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
      
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
        <!-- banner -->
        <div class="bradcam_area">
            <div class="bradcam_shap">
                <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Rencana Agenda Pameran Dalam Negeri Bertaraf Internasional</h3>
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
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/I_agenda/updateAgendaLN" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <!--<label>Nama </label>-->
                                    <input type="hidden" name="id" value="<?=$agenda->id?>">
                                    <input name="nm_agenda" placeholder="Nama Agenda"  class="common-input mb-20 form-control" value="<?= $agenda->nama_agenda?>" required="" type="text">

                                    <input name="tgl_mulai" placeholder="Tanggal Mulai Agenda"  id="txtTahun1" autocomplete="off"class="common-input mb-20 form-control" value="<?= $agenda->tgl_mulai?>" required="" type="text">
                                    <input name="lksi_agenda" placeholder="Lokasi Agenda" class="common-input mb-20 form-control" required="" type="text" value="<?= $agenda->lokasi_agenda?>">

                                                                                <!--<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">-->
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input name="nm_kota" placeholder="Nama Kota" class="common-input mb-20 form-control" required="" type="text" value="<?= $agenda->nama_kota?>">
                                    <input name="tgl_selesai" placeholder="Tanggal Selesai Agenda"  id="txtTahun2" autocomplete="off"class="common-input mb-20 form-control" value="<?= $agenda->tgl_selesai?>" required="" type="text">
                                     <label style="font-size: 18px; font-weight: 800;">DI IKUTI</label>
                                        <!--<input type="checkbox"  class="common-input mb-20"  id="ikut" name="ikut" value="YA">-->
                                    <?php if($agenda->diikuti=='YA'){
                                        echo '<input name="ikut" autocomplete="off"  value="YA" type="checkbox" checked>';
                                    }else {
                                         echo '<input name="ikut" autocomplete="off" value="YA"  type="checkbox">';
                                    } ?>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <h4 style="text-align:left">Surat Penawaran</h4>
                                      <p style="text-align:left"><?= ($agenda->suratpenawaran != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                    <input type="file" class="common-input mb-20 form-control" value="<?=$agenda->suratpenawaran?>" name="suratpenawaran">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <h4 style="text-align:left">Brosur</h4>
                                     <p style="text-align:left"><?= ($agenda->brosur != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                    <input type="file" class="common-input mb-20 form-control" name="brosur">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <h4 style="text-align:left">Foto Lokasi </h4>
                                    <p style="text-align:left"><?= ($agenda->foto_lokasi != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                    <input type="file" class="common-input mb-20 form-control" name="foto_lokasi">
                                </div>
                                <div class="col-lg-6">
                                    <button class="genric-btn primary" style="float: right;margin-top: 45px;">Simpan Agenda</button>
                                </div>
                            </div>
                        </form>
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
                format: "yyyy-mm-dd",
                viewMode: "date",
                minViewMode: "date"
            });
            $("#txtTahun2").datepicker({
                format: "yyyy-mm-dd",
                viewMode: "date",
                minViewMode: "date"
            });


        </script>

    </body>
</html>
