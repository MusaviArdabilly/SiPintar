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
                            <h3>UPLOAD DATA BPS NASIONAL</h3>
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
                    <div class="col-lg-4" style="border: 3px solid;border-color: #dedede;margin-right:10px">
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/E_bps_nasional/upload_excel" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!--                                <div class="col-lg-3 form-group">
                                                                    <select class="common-input mb-20 form-control" name="kd_exim">
                                                                        <option value="EKSPOR">EKSPOR</option>
                                                                        <option value="IMPOR">IMPOR</option>
                                                                    </select>
                                                                </div>-->
                                <div class="col-lg-12 form-group">
                                    <h3 style="text-align: center;color:#001d38">
                                        <a href="<?= base_url() ?>format_upload/BPSdatanasional.xlsx" target="_blank" download> 
                                            <i class="fa fa-file-excel-o"> Contoh Format Upload Excel</i>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input type="file" name="file" accept=".xlsx"  class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-12">
                                    <button class="genric-btn btn-success" onclick="myFunction()" style="float:right">Upload Excel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7" style="border: 3px solid;border-color: #dedede;"> 
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/E_bps_nasional/inputData" method="post" enctype="mE_umkmultipart/form-data">


                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <h3 style="text-align: left;color:#001d38">Input Data</h3>
                                </div>

                                <div class="col-lg-4 form-group">
                                    <select class="common-input mb-20 form-control" name="exim">
                                        <option value="EKSPOR">EKSPOR</option>
                                        <option value="IMPOR">IMPOR</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="bultah" id="txtTahun1" placeholder="BULAN TAHUN"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <select class="common-input mb-20 form-control" name="kategori">
                                        <option value="MIGAS">MIGAS</option>
                                        <option value="NONMIGAS">NONMIGAS</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="nilai" placeholder="NILAI"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-8 form-group">
                                    <button class="genric-btn primary"  onclick="myFunction()" style="float: right;
    margin: 20px 5px;">Simpan Data</button>
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
            });
        </script>

        <script>
            function myFunction() {
                alert("Data anda telah ditambahkan, Terimakasih !!! :)");
            }
        </script>
    </body>
</html>
