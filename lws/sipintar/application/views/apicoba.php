<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"/>

        <style>
            .table-bordered {
                border: 1px solid #dee2e6;
            }
            .table {
                width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
            }
            .table-bordered {
                border: 1px solid #dee2e6;
            }
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
            }
            .table {
                margin: 0;
            }

            .red {
                color: #cc0000;
            }

            .glyphicon {
                position: relative;
                top: 1px;
                display: inline-block;
                font-family: 'Glyphicons Halflings';
                font-style: normal;
                font-weight: 400;
                line-height: 1;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
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
        <section class="relative about-banner">	
                   <div class="overlay overlay-bg"></div>
                   <div class="container">				
                       <div class="row d-flex align-items-center justify-content-center">
                           <div class="about-content col-lg-12">
                               <h1 class="text-white">
                                DATA IMPOR		
                               </h1>	
                               <p class="text-white link-nav"><a href="<?= base_url() ?>index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Tampil Data</a>  <span class="lnr lnr-arrow-right"></span>  <a>Data Impor</a></p>
                           </div>	
                       </div>
                   </div>
               </section>

        <!-- Start contact-page Area -->
        <section class="contact-page-area section-gap">
            <div class="container">
                <div class="card-body card-block" >
                    <div class="row">
            <div class="col-md-6">
                <?php
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://siskaperbapo.com/",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HEADER => FALSE,
                ));

                $response = curl_exec($curl);
                curl_close($curl);
                //echo $response;
                $doc = new DOMDocument();
                @$doc->loadHTML($response);
                $divs = $doc->getElementsByTagName('div');
                $specialdiv = $doc->getElementById('harga');
                if (isset($specialdiv)) {
                    echo $doc->saveXML($specialdiv);
                }
                ?>
            </div>
        </div>
                </div>
        

    </body>
</html>
