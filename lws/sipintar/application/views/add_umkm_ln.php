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
                        <div class="row">
                            <div class="col-lg-6 form-group">

                                <!--<label>Nama </label>-->
                                <input type="hidden" name="id" value="<?= $agenda->id ?>">
                                <input name="nm_agenda" placeholder="Nama Agenda"  class="common-input mb-20 form-control" value="<?= $agenda->nama_agenda ?>" type="text" readonly="">

                                <input name="tgl_mulai" placeholder="Tanggal Mulai Agenda"  id="txtTahun1" autocomplete="off"class="common-input mb-20 form-control" value="<?= $agenda->tgl_mulai ?>"readonly="" type="text">
                                <input name="lksi_agenda" placeholder="Lokasi Agenda" class="common-input mb-20 form-control" readonly="" type="text" value="<?= $agenda->lokasi_agenda ?>">

                                                                                <!--<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">-->
                            </div>
                            <div class="col-lg-6 form-group">
                                <input name="nm_kota" placeholder="Nama Kota" class="common-input mb-20 form-control" readonly="" type="text" value="<?= $agenda->nama_kota ?>">
                                <input name="tgl_selesai" placeholder="Tanggal Selesai Agenda"  id="txtTahun2" autocomplete="off"class="common-input mb-20 form-control" value="<?= $agenda->tgl_selesai ?>" readonly="" type="text">

                            </div>
                            <div class="col-lg-6 form-group">
                                <h4 style="text-align:left">Surat Penawaran</h4>
                                <p style="text-align:left"><?= ($agenda->suratpenawaran != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                <input type="file" class="common-input mb-20 form-control" disabled="" value="<?= $agenda->suratpenawaran ?>" name="suratpenawaran">
                            </div>
                            <div class="col-lg-6 form-group">
                                <h4 style="text-align:left">Brosur</h4>
                                <p style="text-align:left"><?= ($agenda->brosur != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                <input type="file" class="common-input mb-20 form-control" disabled="" name="brosur">
                            </div>
                            <div class="col-lg-6 form-group">
                                <h4 style="text-align:left">Foto Lokasi </h4>
                                <p style="text-align:left"><?= ($agenda->foto_lokasi != '') ? '<i class="fa fa-check-circle" style="color: #4BB543"> File telah terlampir</i>' : '<i class="fa fa-minus" style="color: #F44336"> File Belum ada</i>' ?></p>
                                <input type="file" class="common-input mb-20 form-control" disabled="" name="foto_lokasi">
                            </div>

                        </div>
                    </div>
                    <h2 style="text-align: center">TAMBAH UMKM</h2>
                    <div class="col-lg-12">
                        <form action="<?= base_url() ?>index.php/I_agenda/agendaUmkm" method="POST" name="myForm">

                            <input type="hidden" name="id_agenda" value="<?= $agenda->id ?>">
                            <input type="hidden" name="jumlah_add_umkm" value="1">

                            <div class="row row-jenis-form-brg" data-count="1">
                                <div class="col-lg-6 form-group">
                                    <select class="common-input mb-20 form-control" name="umkm" id="selectUmkm">
                                        <option value="" class="l1" selected>Pilih UMKM</option>
                                        <?php foreach ($umkm as $key => $value) { ?>
                                            <option class="l2" value="<?= $value->id ?>|<?= $value->nama ?>"><?= $value->nama ?></option>
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" name="hscode" placeholder="HS Code" class="form-control">-->
                                </div>
                            </div>

                            <div style="text-align: center">
                                <button type="button" class="btn btn-warning btn-sm" id="btn_add_umkm">
                                    <i class="fa fa-plus"></i>&nbsp;Tambah UMKM</button>
                                <button type="button" class="btn btn-danger btn-sm" id="reset-form-brg">
                                    <i class="fa fa-repeat"></i>&nbsp;Reset UMKM</button>

                            </div>

                            <div class="col-lg-6">
                                <button class="genric-btn primary" style="float: right;margin-top: 45px;">Simpan Agenda</button>
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


//ADD UMKM
            $(document).ready(function () {

                $('#btn_add_umkm').on('click', function () {
                    var last_row = $('.row-jenis-form-brg').last();
                    var count = last_row.data('count') + 1;
                    $('input[name=jumlah_add_umkm]').val(count);
                    var content =
                            ' <div class="row row-jenis-form-brg" data-count="' + count + '">' +
                            '<div class="col-lg-6 form-group">' +
                            ' <select class="common-input mb-20 form-control" name="umkm_' + count + '" id="selectUmkm">' +
                            ' <option value="" class="l1" selected>Pilih UMKM</option>' +
                            '  <?php foreach ($umkm as $key => $value) { ?>' +
                                '     <option class="l2" value="<?= $value->id ?>|<?= $value->nama ?>"><?= $value->nama ?></option>' +
                                ' <?php } ?>' +
                            ' </select>' +
                            '</div>' +
                            '</div>';


                    last_row.after(content);
                });
                $('#reset-form-brg').on('click', function (e) {
                    resetFormBrg();
                });

                function resetFormBrg() {
                    $('form[name=myForm]')[0].reset();
                    $(".select-simple").val('').trigger('change');
                    $('.select-simple').parent().addClass('is-empty');
                    $('.row-jenis-form-brg').each(function (index) {
                        if (index != 0) {
                            $(this).remove();
                        }
                    });
                }
            });
        </script>

    </body>
</html>
