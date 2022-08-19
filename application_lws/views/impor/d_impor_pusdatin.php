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
                                <h3>Upload Data Impor Migas</h3>
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
                            <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/Data_impor_pusdatin/upload_excel" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-lg-6 form-group">
                                     <input name="file" accept=".xlsx"  class="common-input mb-20 form-control"  type="file">
                                </div>
                                <div class="col-lg-6">
                                    <button class="genric-btn btn-success" >Upload Exclel</button>
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
