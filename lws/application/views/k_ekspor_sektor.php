	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?php $this->load->view('template/css')?>
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
			<section class="relative about-banner">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								 Ekspor Non Migas Per Sektor Jawa Timur Jan-Des				
							</h1>	
                                                    <p class="text-white link-nav"><a href="<?= base_url()?>index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Kinerja</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
            <div class="container">
                <div class="row">
                    <table style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th> 
                                <th>Realisasi Ekspor</th>
                                <th><input type="text" class="common-input mb-20 form-control"  placeholder="Tahun Ke-1" data-mask id="txtTahun1" autocomplete="off"></th>
                                <th><input type="text" class="common-input mb-20 form-control"  placeholder="Tahun Ke-2" data-mask id="txtTahun2" autocomplete="off"></th>
                                <th>
                                    <input type="text" class="common-input mb-20 form-control"  placeholder="Bulan Awal" data-mask id="txtTahun3" autocomplete="off">
                                    <input type="text" class="common-input mb-20 form-control"  placeholder="Tahun Ke-3" data-mask id="txtTahun4" autocomplete="off">
                                </th>
                                <th>
                                    <input type="text" class="common-input mb-20 form-control"  placeholder="Bulan Akhir" data-mask id="txtTahun5" autocomplete="off">
                                    <input type="text" class="common-input mb-20 form-control"  placeholder="Tahun Ke-4" data-mask id="txtTahun6" autocomplete="off">
                                </th>
                                <th style="text-align: center">
                                    d(%)*
                                </th>
                                <th style="text-align: center">
                                    Peran(%)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><p>1</p></td>
                                <td><p>Pertanian</p></td>
                                <td>
                                    <input name="nil21" class="common-input mb-20 form-control" required="" type="text" >
                                </td>
                                <td>
                                    <input name="nil22" class="common-input mb-20 form-control" required="" type="text" >
                                </td>
                                <td>
                                    <input name="nil23" class="common-input mb-20 form-control" required="" type="text">
                                </td>
                                <td>
                                    <input name="nil24" class="common-input mb-20 form-control" required="" type="text" >
                                </td>
                                <td>
                                    <input name="nil_2d" class="common-input mb-20 form-control" required="" type="text">
                                </td>
                                <td>
                                    <input name="nil_2persen" class="common-input mb-20 form-control" required="" type="text" >
                                </td>
                            </tr>
                            <tr>
                                <td><p>2</p></td>
                                <td><p>Industri</p></td>
                                <td>
                                    <input name="nil1" class="common-input mb-20 form-control" required="" type="text" onkeyup="calc()">
                                </td>
                                <td>
                                    <input name="nil2" class="common-input mb-20 form-control" required="" type="text"onkeyup="calc()">
                                </td>
                                <td>
                                    <input name="nil3" class="common-input mb-20 form-control" required="" type="text"onkeyup="calc()" >
                                </td>
                                <td>
                                    <input name="nil4" class="common-input mb-20 form-control" required="" type="text" onkeyup="calc()">
                                </td>
                                <td>
                                    <input name="nil_d" class="common-input mb-20 form-control" required="" type="text" disabled="">
                                </td>
                                <td>
                                    <input name="nil_persen" class="common-input mb-20 form-control" required="" type="text" disabled="">
                                </td>
                            </tr>
                            <tr>
                                <td><p>3</p></td>
                                <td><p>Pertambangan</p></td>
                                 <td>
                                    <input name="nil11" class="common-input mb-20 form-control" required="" type="text" onkeyup="calc()">
                                </td>
                                <td>
                                    <input name="nil12" class="common-input mb-20 form-control" required="" type="text" onkeyup="calc()">
                                </td>
                                <td>
                                    <input name="nil13" class="common-input mb-20 form-control" required="" type="text" onkeyup="calc()">
                                </td>
                                <td>
                                    <input name="nil14" class="common-input mb-20 form-control" required="" type="text" onkeyup="calc()">
                                </td>
                                <td>
                                    <input name="nil_1d" class="common-input mb-20 form-control" required="" type="text" readonly="">
                                </td>
                                <td>
                                    <input name="nil_1persen" class="common-input mb-20 form-control" required="" type="text" readonly="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>	
        </section>
			<!-- End contact-page Area -->

            <!-- start footer Area -->
            <footer class="footer-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h4>About Me</h4>
                                <p>
                                    We have tested a number of registry fix and clean utilities and present our top 3 list on our site for your convenience.
                                </p>
                                <p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h4>Newsletter</h4>
                                <p>Stay updated with our latest trends</p>
								<div class="" id="mc_embed_signup">
									 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									  <div class="input-group">
									    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
									    <div class="input-group-btn">
									      <button class="btn btn-default" type="submit">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>    
									    </div>
									    	<div class="info"></div>  
									  </div>
									</form> 
								</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                            <div class="single-footer-widget">
                                <h4>Follow Me</h4>
                                <p>Let us be social</p>
                                <div class="footer-social d-flex align-items-center">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->		
  <?php $this->load->view('template/js') ?>
			 <script type="text/javascript">
                             
                  function calc() {
                
                  nil1 = document.querySelector('input[name=nil1]').value;
                  nil2 = document.querySelector('input[name=nil2]').value;
                  nil3 = document.querySelector('input[name=nil3]').value;
                  nil4 = document.querySelector('input[name=nil4]').value;
                  
                  nil11 = document.querySelector('input[name=nil11]').value;
                  nil12 = document.querySelector('input[name=nil12]').value;
                  nil13 = document.querySelector('input[name=nil13]').value;
                  nil14 = document.querySelector('input[name=nil14]').value;
                  
                  nil21 = document.querySelector('input[name=nil21]').value;
                  nil22 = document.querySelector('input[name=nil22]').value;
                  nil23 = document.querySelector('input[name=nil23]').value;
                  nil24 = document.querySelector('input[name=nil24]').value;
                  
                  //TOTAL
                  ttl1 = eval(nil1) + eval(nil11);
                  ttl2 = eval(nil2) + eval(nil12); 
                  ttl3 = eval(nil3) + eval(nil13);
                  ttl4 = eval(nil4) + eval(nil14);
                  
                  //D PERSEN
                  t_industri = nil4 - nil3;
                  d_industri = t_industri/nil3;
                  d_persen = d_industri * 100;
                  
                  t_pertambangan = nil14 - nil13;
                  d_pertambangan = t_pertambangan/nil13;
                  d_persen2  = d_pertambangan*100;
                  
                  t_pertanian = nil24 - nil23;
                  d_pertanian = t_pertanian/nil23;
                  d_persen2  = d_pertanian*100;
                  
                  t_total   = ttl4 - ttl3;
                  t_total2  = t_total/ttl3;
                  t_total3  = t_total2 * 100;
                  
                  
                  //PERAN PERSEN
                  nilmigas = nil4/ttl4 * 100;
                  nilmigas2 = nil14/ttl4 * 100;
                  
                  nilmigas3 = nil13/ttl4 *100;
                  nilmigas4 = nil14/ttl4 *100;
                        
                        
                     //D PERSEN   
                     document.querySelector('input[name=nil_d]').value = eval(d_persen).toFixed(2);
                     document.querySelector('input[name=nil_1d]').value = eval(d_persen2).toFixed(2);
                     document.querySelector('input[name=ttl_d]').value = eval(t_total3).toFixed(2);
                     
                     
                     //PERAN PERSEN
                     document.querySelector('input[name=nil_persen]').value = eval(nilmigas).toFixed(2);
                     document.querySelector('input[name=nil_1persen]').value = eval(nilmigas2).toFixed(2);
                     document.querySelector('input[name=ttl_persen]').value = 100;
                     
                     //TOTAL
                     document.querySelector('input[name=ttl1]').value = eval(ttl1).toFixed(2);
                     document.querySelector('input[name=ttl2]').value = eval(ttl2).toFixed(2);
                     document.querySelector('input[name=ttl3]').value = eval(ttl3).toFixed(2);
                     document.querySelector('input[name=ttl4]').value = eval(ttl4).toFixed(2); 
                        
                    }
            $("#txtTahun1").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
            $("#txtTahun2").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
            $("#txtTahun3").datepicker({
                format: "MM",
                viewMode: "months",
                minViewMode: "months"
            });
            $("#txtTahun4").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
            $("#txtTahun5").datepicker({
                format: "MM",
                viewMode: "months",
                minViewMode: "months"
            });
            $("#txtTahun6").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script>	
		</body>
	</html>