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
                                <h3>Managemen User</h3>
                                <nav class="brad_cam_lists">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Managemen User</li>
                                      </ul>
                                </nav>
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
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                        <form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/User/inputUser" method="post">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <!--<label>Nama </label>-->
                                    <input name="nm_user" placeholder="Nama User"  class="common-input mb-20 form-control" required="" type="text" autocomplete="off">

                                    <input name="pass" placeholder="Password"  class="common-input mb-20 form-control" required="" type="password" autocomplete="off">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input name="email" placeholder="Email" class="common-input mb-20 form-control" required="" type="email" autocomplete="off">
                                    <select name="role" class="common-input mb-20 form-control">
                                        <option value="USER">USER</option>
                                        <option value="ADMIN">ADMIN</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <button class="genric-btn primary" style="float: right;">Tambah User</button>
                                </div>
                            </div>
                        </form>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 50px">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">LIST USER</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($user as $key => $value){?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?= $value->user_login ?></td>
                                            <td><?= $value->user_email ?></td>
                                            <td><?= $value->user_role ?></td>
                                            <td style="text-align:center">
                                                    <button class="btn btn-warning btn-sm"><a href="<?= base_url()?>index.php/User/edit/<?=$value->id?>">EDIT</a></button>

                                                    <button class="btn btn-danger btn-sm" data-target="#deletemodal" data-toggle="modal" data-id="<?= $value->id ?>">DELETE USER</button>
                                                </td>
                                            <!--<td><button class="btn btn-danger">DELETE</button></td>-->
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
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
            <form method="POST" action="<?= base_url() ?>index.php/User/deleteUser">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 style="text-align: center">Delete USER</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="" id="idDelete">

                            <div class="col col-md-12" style="text-align: center;">
                                <h3>Apakah anda yakin akan menghapus USER ini ???</h3><br>
                            </div>
                            <div class="col-12 col-md-12">
                                <!--<input type="hidden" name="password" value="user12345">-->
                            </div>
                        </div>

                        <br><br>
                        <div class="modal-footer" style="text-align: center;">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-danger btn-sm">Delete USER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
            $('#deletemodal').on('shown.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                $('#idDelete').val(id);
            });
        </script>
    </body>
</html>
