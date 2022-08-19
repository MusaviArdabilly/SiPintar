<!DOCTYPE html>
<html lang="zxx" class="no-js">
     <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"/>
   <link href="<?= base_url() ?>assets/vendor/select-search/select-search.min.css" rel="stylesheet">
   <style>
       .select2-container {
            padding-top: 23px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 72px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 46px;
}
   </style>
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
                                <h3>Entri data UMKM untuk potensi ekspor</h3>
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
<form class="form-area contact-form text-right" action="<?= base_url() ?>index.php/E_umkm/inputData" method="post" enctype="multipart/form-data">
                        
                    <div class="col-lg-12">
                            <div class="row">
                                
                                <div class="col-lg-4 form-group">
                                    <select class="common-input mb-20 form-control" name="umkm">
                                        <option value="CV">CV</option>
                                        <option value="UD">UD</option>
                                        <option value="PT">PT</option>
                                        <option value="KOPERASI">KOPERASI</option>
                                    </select>
                                </div>
                                
                                
                                <div class="col-lg-8 form-group">
                                     <input name="nm_umkm" placeholder="NAMA UMKM" autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="almt_umkm" placeholder="ALAMAT UMKM"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                 <div class="col-lg-4 form-group">
                                     <select class="common-input mb-20 form-control select2" name="kabupaten" id="kabupaten">
                                        <option value="" selected>Pilih Kab/Kota</option>
                                        <?php foreach ($kota as $key => $value) { ?>
                                            <option value="<?= $value->id ?>|<?= $value->kab_kota ?>"><?= $value->kab_kota ?></option>
                                        <?php } ?>
                                    </select>
                                    <!--<input name="kota_umkm" placeholder="KAB/KOTA UMKM"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">-->
                                </div>
<!--                                <div class="col-md-3">
                                    <label>Kecamatan</label>
                                    <select class="form-control p-input chosen-select" name="kecamatan" id="kecamatan" required="true">
                                        <option value="">---Pilih Kecamatan---</option>
                                    </select>
                                </div>-->
                                <div class="col-lg-4 form-group">
                                    <select class="form-control p-input chosen-select select2" name="kecamatan" id="kecamatan" required="true">
                                        <option value="">---Pilih Kecamatan---</option>
                                    </select>
                                    <!--<input name="kel_umkm" placeholder="KELURAHAN/DESA, KECAMATAN UMKM"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">-->
                                </div>
                               
                                <div class="col-lg-4 form-group">
                                    <input name="kdpos_umkm" placeholder="KODE POS"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                
                                <div class="col-lg-4 form-group">
                                    <input name="email_umkm" placeholder="EMAIL UMKM"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input name="no_umkm" placeholder="NO. HANDPHONE UMKM"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <select class="form-control select2" name="komoditas" id="selectHs">
                                        <option value=""  selected>Pilih HS Code</option>
                                        <?php foreach ($komoditi as $key => $value) { ?>
                                            <option value="<?= $value->KD_HS2DIGIT ?>"><?= $value->KD_HS2DIGIT ?></option>
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" name="hscode" placeholder="HS Code" class="form-control">-->
                                </div>
                             
                                <div class="col-lg-8 form-group">
                                    <input type="text" name="descy" value="" class="form-control number" disabled>
                                    <input type="hidden" name="desc" value="">
                                </div>
                                <div class="col-lg-4 form-group">
                                     <h6 style="text-align: left">NPWP</h6>
                                    <input type="file" name="filenpwp"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                     <h6 style="text-align: left">SIUP</h6>
                                    <input type="file" name="filesiup"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                     <h6 style="text-align: left">TDP</h6>
                                    <input type="file" name="filetdp"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                     <h6 style="text-align: left">NIB</h6>
                                    <input type="file" name="filenib"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                     <h6 style="text-align: left">No. Halal & Tgl (Jika Mamin)</h6>
                                    <input type="file" name="filenohalal"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                    <h6 style="text-align: left">PIRT</h6>
                                    <input type="file" name="filepirt"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                    <h6 style="text-align: left">SVLK</h6>
                                    <input type="file" name="filesvlk"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                    <h6 style="text-align: left">MERK</h6>
                                    <input type="file" name="filemerk"   class="common-input mb-20 form-control" >
                                </div>
                                <div class="col-lg-4 form-group">
                                     <h6 style="text-align: left">CONTACT PERSON</h6>
                                    <input name="cp" placeholder="CONTACT PERSON"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text">
                                </div>

                                
                                </div>
                                
                                <div class="col-lg-12">
                                    <button class="genric-btn primary"  onclick="myFunction()" style="float: right;">Simpan Data</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-12" style="padding-top: 50px">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="kinerja" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA UMKM PESERTA YANG MENGIKUTI</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($umkm as $key => $value){?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?= $value->jenis ?></td>
                                            <td><?= $value->nama ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td style="text-align:center">
                                                    <button class="btn btn-warning btn-sm"><a href="<?= base_url()?>index.php/E_umkm/edit/<?=$value->id?>">EDIT</a></button>

                                                    <button class="btn btn-danger btn-sm" data-target="#deletemodal" data-toggle="modal" data-id="<?= $value->id ?>">DELETE UMKM</button>
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
        <!-- End contact-page Area -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
            <form method="POST" action="<?= base_url() ?>index.php/E_umkm/deleteUmkm">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 style="text-align: center">Delete UMKM</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="" id="idDelete">

                            <div class="col col-md-12" style="text-align: center;">
                                <h3>Apakah anda yakin akan menghapus UMKM ini ???</h3><br>
                            </div>
                            <div class="col-12 col-md-12">
                                <!--<input type="hidden" name="password" value="user12345">-->
                            </div>
                        </div>

                        <br><br>
                        <div class="modal-footer" style="text-align: center;">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-danger btn-sm">Delete UMKM</button>
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
        
        
        
        <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/select-search/select-search.js"></script>
        
        
        <script type="text/javascript">
            $("#txtTahun1").datepicker({
                format: "M - yyyy",
                viewMode: "months",
                minViewMode: "months"
            });$('#deletemodal').on('shown.bs.modal', function (e) {
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
        
        //AUTO COMPLETE
          var desc;
                    $('#selectHs').on('change', function (e) {
                        var hs = $(this).val();
                        $.ajax({
                            url: '<?= base_url() ?>index.php/E_umkm/ajax_get_desc',
                            data: {
                                hs: hs
                            },
                            dataType: 'json',
                            method: 'POST',
                            success: function (res) {
                                $('input[name=desc]').val(res.DESCR);
                                $('input[name=descy]').val(res.DESCR);
                                desc = res.DESCR;
                            }
                        });
                    });
                    
                    $("#kabupaten").change(function () {
                    var kabupaten = $("#kabupaten").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/E_umkm/getKecamatan",
                        data: "kabupaten=" + kabupaten,
                        dataType: 'html',
                        success: function (data) {
                            // console.log(data);
                            $("#kecamatan").html(data)
                            $('#kecamatan').trigger("chosen:updated");
                        }
                    })
                });
                      
                
                
                 $('.select2').select2({
                                            templateResult: function (data) {
                                                // We only really care if there is an element to pull classes from
                                                if (!data.element) {
                                                    return data.text;
                                                }

                                                var $element = $(data.element);

                                                var $wrapper = $('<span style="padding-top:23px;"></span>');
                                                $wrapper.addClass($element[0].className);

                                                $wrapper.text(data.text);

                                                return $wrapper;
                                            }
                                        });
                
        </script>
    </body>
</html>
