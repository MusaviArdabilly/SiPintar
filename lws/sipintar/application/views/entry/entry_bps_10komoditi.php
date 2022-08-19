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

        <!-- banner -->
        <div class="bradcam_area">
                <div class="bradcam_shap">
                    <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>UPLOAD DATA BPS KOMODITI</h3>
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
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/E_bps_10komoditi/upload_excel" method="post" enctype="multipart/form-data">
                            <div class="row">
<!--                                <div class="col-lg-3 form-group">
                                    <select class="common-input mb-20 form-control" name="kd_exim">
                                        <option value="EKSPOR">EKSPOR</option>
                                        <option value="IMPOR">IMPOR</option>
                                    </select>
                                </div>-->
                                    <div class="col-lg-12 form-group">
                                        <h3 style="text-align: left;color:green">
                                            <a href="<?= base_url()?>format_upload/bps10komoditiexim.xlsx" target="_blank" download> 
                                                <i class="fa fa-file-excel-o"> Contoh Format Upload Excel</i>
                                            </a>
                                        </h3>
                                    </div>
                                <div class="col-lg-6 form-group">
                                     <input type="file" name="file" accept=".xlsx"  class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-6">
                                    <button class="genric-btn btn-success" onclick="myFunction()" >Upload Excel</button>
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
                format: "M - yyyy",
                viewMode: "months",
                minViewMode: "months"
            });
        </script>

        <script>
        function myFunction() {
          alert("Data anda telah ditambahkan, Terimakasih !!! :)");
        }
        </script>
    </body>
</html>
