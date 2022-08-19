<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css')?>
        <style>
         #slide{
        width:100%;
        }

        /* * {
        box-sizing: border-box
        } */

        .mySlides {
        display: none
        }

        .slideshow-container {
        /* width: 1200px; */
        position: relative;
        /* margin: -10px; */

        }
        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        }
        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
        }
        /* Caption text */
        .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        }

        /* The dots/bullets/indicators */
        .dot {
        cursor: pointer;
        height: 13px;
        width: 13px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }
        .active, .dot:hover {
        background-color: #717171;
        }
        /* Fading animation */
        .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 2s;
        animation-name: fade;
        animation-duration: 2s;
        }
        @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
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
        <!-- #header -->

        <!-- start banner Area -->
        <div class="slider_area">
            <div class="shap_img_1 d-none d-lg-block">
                <img src="<?= base_url()?>seogo/img/ilstrator/body_shap_1.png" alt="">
            </div>
            <div class="poly_img">
                <img src="<?= base_url()?>seogo/img/ilstrator/poly.png" alt="">
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 offset-xl-1">
                            <!-- <div class="slider_text text-center"> -->
                                <!-- <div class="text">
                                    <h3>
                                        BoostUp your Business &amp; Get <br>
                                            top of Search Engine
                                    </h3>
                                <a class="boxed-btn3" href="#">Get Started</a>
                                </div> -->
                                <!-- <div class="ilstrator_thumb">
                                    <img src="<?= base_url()?>assets/img/bgsipintar.jpg" alt="">
                                </div>
                            </div> -->
                            <div id="slide">
                            <div class="slideshow-container">
                              <div class="mySlides fade"> <img src="<?= base_url()?>assets/img/1.jpg" style="width:100%;height:500px"> </div>
                              <div class="mySlides fade"> <img src="<?= base_url()?>assets/img/2.jpg" style="width:100%;height:500px"> </div>
                              <div class="mySlides fade"> <img src="<?= base_url()?>assets/img/3.jpg" style="width:100%;height:500px"> </div>
                              <div class="mySlides fade"> <img src="<?= base_url()?>assets/img/4.jpg" style="width:100%;height:500px"> </div>
                              <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> </div>
                            <br>
                            <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            <span class="dot" onclick="currentSlide(4)"></span>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <section class="banner-area ">
            <div class="single_slider  d-flex align-items-center slider_bg_1">

            <div class="container">
                <div class="row fullscreen align-items-center justify-content-between"> -->
                    <!-- <div class="col-lg-12" style="padding:100px">

                     <img class="img-fluid" src="<?= base_url()?>assets/img/bgsipintar.jpg" alt="">
                    </div> -->
                    <!-- <div class="slider_text text-center">
                            <div class="ilstrator_thumb">
                                <img src="<?= base_url()?>assets/img/bgsipintar.jpg" alt="">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </section> -->
        <!-- End banner Area -->

        <!-- Start home-about Area -->
<!--        <section class="home-about-area pt-120">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-6 home-about-left">
                        <img class="img-fluid" src="<?= base_url()?>assets/img/about-img.png" alt="">
                    </div>
                    <div class="col-lg-5 col-md-6 home-about-right">
                        <h6>About Me</h6>
                        <h1 class="text-uppercase">Personal Details</h1>
                        <p>
                            Here, I focus on a range of items and features that we use in life without giving them a second thought. such as Coca Cola. Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                        </p>
                        <a href="#" class="primary-btn text-uppercase">View Full Details</a>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- End home-about Area -->

        <!-- Start services Area -->
<!--        <section class="services-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content  col-lg-7">
                        <div class="title text-center">
                            <h1 class="mb-10">My Offered Services</h1>
                            <p>At about this time of year, some months after New Year’s resolutions have been made and kept, or made and neglected.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">
                            <span class="lnr lnr-pie-chart"></span>
                            <a href="#"><h4>Web Design</h4></a>
                            <p>
                                “It is not because things are difficult that we do not dare; it is because we do not dare that they are difficult.”
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">
                            <span class="lnr lnr-laptop-phone"></span>
                            <a href="#"><h4>Web Development</h4></a>
                            <p>
                                If you are an entrepreneur, you know that your success cannot depend on the opinions of others. Like the wind, opinions.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">
                            <span class="lnr lnr-camera"></span>
                            <a href="#"><h4>Photography</h4></a>
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">
                            <span class="lnr lnr-picture"></span>
                            <a href="#"><h4>Clipping Path</h4></a>
                            <p>
                                Hypnosis quit smoking methods maintain caused quite a stir in the medical world over the last two decades. There is a lot of argument.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">
                            <span class="lnr lnr-tablet"></span>
                            <a href="#"><h4>Apps Interface</h4></a>
                            <p>
                                Do you sometimes have the feeling that you’re running into the same obstacles over and over again? Many of my conflicts.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">
                            <span class="lnr lnr-rocket"></span>
                            <a href="#"><h4>Graphic Design</h4></a>
                            <p>
                                You’ve heard the expression, “Just believe it and it will come.” Well, technically, that is true, however, ‘believing’ is not just thinking that.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- End services Area -->

        <!-- Start fact Area -->
<!--        <section class="facts-area section-gap" id="facts-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 single-fact">
                        <h1 class="counter">2536</h1>
                        <p>Projects Completed</p>
                    </div>
                    <div class="col-lg-3 col-md-6 single-fact">
                        <h1 class="counter">6784</h1>
                        <p>Happy Clients</p>
                    </div>
                    <div class="col-lg-3 col-md-6 single-fact">
                        <h1 class="counter">2239</h1>
                        <p>Cups of Coffee</p>
                    </div>
                    <div class="col-lg-3 col-md-6 single-fact">
                        <h1 class="counter">435</h1>
                        <p>Real Professionals</p>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- end fact Area -->

        <!-- Start portfolio-area Area -->
<!--        <section class="portfolio-area section-gap" id="portfolio">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Our Latest Featured Projects</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                    </div>
                </div>

                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".vector">Vector</li>
                        <li data-filter=".raster">Raster</li>
                        <li data-filter=".ui">UI/UX</li>
                        <li data-filter=".printing">Printing</li>
                    </ul>
                </div>

                <div class="filters-content">
                    <div class="row grid">
                        <div class="single-portfolio col-sm-4 all vector">
                            <div class="relative">
                                <div class="thumb">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="image img-fluid" src="<?= base_url()?>assets/img/p1.jpg" alt="">
                                </div>
                                <a href="<?= base_url()?>assets/img/p1.jpg" class="img-pop-up">
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="<?= base_url()?>assets/img/preview.png" alt=""></div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-inner">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">vector</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all raster">
                            <div class="relative">
                                <div class="thumb">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="image img-fluid" src="<?= base_url()?>assets/img/p2.jpg" alt="">
                                </div>
                                <a href="<?= base_url()?>assets/img/p2.jpg" class="img-pop-up">
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="<?= base_url()?>assets/img/preview.png" alt=""></div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-inner">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">vector</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all ui">
                            <div class="relative">
                                <div class="thumb">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="image img-fluid" src="<?= base_url()?>assets/img/p3.jpg" alt="">
                                </div>
                                <a href="<?= base_url()?>assets/img/p3.jpg" class="img-pop-up">
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="<?= base_url()?>assets/img/preview.png" alt=""></div>
                                    </div>
                                </a>

                            </div>
                            <div class="p-inner">
                                <h4>Creative Poster Design</h4>
                                <div class="cat">Agency</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all printing">
                            <div class="relative">
                                <div class="thumb">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="image img-fluid" src="<?= base_url()?>assets/img/p4.jpg" alt="">
                                </div>
                                <a href="<?= base_url()?>assets/img/p4.jpg" class="img-pop-up">
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="img/preview.png" alt=""></div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-inner">
                                <h4>Embosed Logo Design</h4>
                                <div class="cat">Portal</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all vector">
                            <div class="relative">
                                <div class="thumb">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="image img-fluid" src="<?= base_url()?>assets/img/p5.jpg" alt="">
                                </div>
                                <a href="<?= base_url()?>assets/img/p5.jpg" class="img-pop-up">
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="<?= base_url()?>assets/img/preview.png" alt=""></div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-inner">
                                <h4>3D Helmet Design</h4>
                                <div class="cat">vector</div>
                            </div>
                        </div>
                        <div class="single-portfolio col-sm-4 all raster">
                            <div class="relative">
                                <div class="thumb">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="image img-fluid" src="<?= base_url()?>assets/img/p6.jpg" alt="">
                                </div>
                                <a href="img/p6.jpg" class="img-pop-up">
                                    <div class="middle">
                                        <div class="text align-self-center d-flex"><img src="<?= base_url()?>assets/img/preview.png" alt=""></div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-inner">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">raster</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>-->
        <!-- End portfolio-area Area -->

        <!-- Start testimonial Area -->
<!--        <section class="testimonial-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Client’s Feedback About Me</h1>
                            <p>It is very easy to start smoking but it is an uphill task to quit it. Ask any chain smoker or even a person.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="active-testimonial">
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="<?= base_url()?>assets/img/elements/user1.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.
                                </p>
                                <h4>Harriet Maxwell</h4>
                                <p>CEO at Google</p>
                            </div>
                        </div>
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="<?= base_url()?>assets/img/elements/user2.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
                                </p>
                                <h4>Carolyn Craig</h4>
                                <p>CEO at Facebook</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- End testimonial Area -->

        <!-- Start price Area -->
<!--        <section class="price-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Choose Your Plan</h1>
                            <p>When someone does something that they know that they shouldn’t do, did they.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 single-price">
                        <div class="top-part">
                            <h1 class="package-no">01</h1>
                            <h4>Economy</h4>
                            <p class="mt-10">For the individuals</p>
                        </div>
                        <div class="package-list">
                            <ul>
                                <li>Secure Online Transfer</li>
                                <li>Unlimited Styles for interface</li>
                                <li>Reliable Customer Service</li>
                            </ul>
                        </div>
                        <div class="bottom-part">
                            <h1>£199.00</h1>
                            <a class="price-btn text-uppercase" href="#">Buy Now</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 single-price">
                        <div class="top-part">
                            <h1 class="package-no">02</h1>
                            <h4>Business</h4>
                            <p class="mt-10">For the individuals</p>
                        </div>
                        <div class="package-list">
                            <ul>
                                <li>Secure Online Transfer</li>
                                <li>Unlimited Styles for interface</li>
                                <li>Reliable Customer Service</li>
                            </ul>
                        </div>
                        <div class="bottom-part">
                            <h1>£299.00</h1>
                            <a class="price-btn text-uppercase" href="#">Buy Now</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 single-price">
                        <div class="top-part">
                            <h1 class="package-no">03</h1>
                            <h4>Premium</h4>
                            <p class="mt-10">For the individuals</p>
                        </div>
                        <div class="package-list">
                            <ul>
                                <li>Secure Online Transfer</li>
                                <li>Unlimited Styles for interface</li>
                                <li>Reliable Customer Service</li>
                            </ul>
                        </div>
                        <div class="bottom-part">
                            <h1>£399.00</h1>
                            <a class="price-btn text-uppercase" href="#">Buy Now</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 single-price">
                        <div class="top-part">
                            <h1 class="package-no">04</h1>
                            <h4>Exclusive</h4>
                            <p class="mt-10">For the individuals</p>
                        </div>
                        <div class="package-list">
                            <ul>
                                <li>Secure Online Transfer</li>
                                <li>Unlimited Styles for interface</li>
                                <li>Reliable Customer Service</li>
                            </ul>
                        </div>
                        <div class="bottom-part">
                            <h1>£499.00</h1>
                            <a class="price-btn text-uppercase" href="#">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- End price Area -->

        <!-- Start recent-blog Area -->
<!--        <section class="recent-blog-area section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 pb-30 header-text">
                        <h1>Latest posts from our blog</h1>
                        <p>
                            You may be a skillful, effective employer but if you don’t trust your personnel and the opposite, then the chances of improving and expanding the business
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="single-recent-blog col-lg-4 col-md-4">
                        <div class="thumb">
                            <img class="f-img img-fluid mx-auto" src="<?= base_url()?>assets/img/b1.jpg" alt="">
                        </div>
                        <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <img class="img-fluid" src="<?= base_url()?>assets/img/user.png" alt="">
                                <a href="#"><span>Mark Wiens</span></a>
                            </div>
                            <div class="meta">
                                13th Dec
                                <span class="lnr lnr-heart"></span> 15
                                <span class="lnr lnr-bubble"></span> 04
                            </div>
                        </div>
                        <a href="#">
                            <h4>Break Through Self Doubt
                                And Fear</h4>
                        </a>
                        <p>
                            Dream interpretation has many forms; it can be done be done for the sake of fun, hobby or can be taken up as a serious career.
                        </p>
                    </div>
                    <div class="single-recent-blog col-lg-4 col-md-4">
                        <div class="thumb">
                            <img class="f-img img-fluid mx-auto" src="<?= base_url()?>assets/img/b2.jpg" alt="">
                        </div>
                        <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <img class="img-fluid" src="<?= base_url()?>assets/img/user.png" alt="">
                                <a href="#"><span>Mark Wiens</span></a>
                            </div>
                            <div class="meta">
                                13th Dec
                                <span class="lnr lnr-heart"></span> 15
                                <span class="lnr lnr-bubble"></span> 04
                            </div>
                        </div>
                        <a href="#">
                            <h4>Portable Fashion for
                                young women</h4>
                        </a>
                        <p>
                            You may be a skillful, effective employer but if you don’t trust your personnel and the opposite, then the chances of improving.
                        </p>
                    </div>
                    <div class="single-recent-blog col-lg-4 col-md-4">
                        <div class="thumb">
                            <img class="f-img img-fluid mx-auto" src="<?= base_url()?>assets/img/b3.jpg" alt="">
                        </div>
                        <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <img class="img-fluid" src="<?= base_url()?>assets/img/user.png" alt="">
                                <a href="#"><span>Mark Wiens</span></a>
                            </div>
                            <div class="meta">
                                13th Dec
                                <span class="lnr lnr-heart"></span> 15
                                <span class="lnr lnr-bubble"></span> 04
                            </div>
                        </div>
                        <a href="#">
                            <h4>Do Dreams Serve As
                                A Premonition</h4>
                        </a>
                        <p>
                            So many of us are demotivated to achieve anything. Such people are not enthusiastic about anything. They don’t want to work involved.
                        </p>
                    </div>


                </div>
            </div>
        </section>-->
        <!-- end recent-blog Area -->

        <!-- Start brands Area -->
        <div class="case_study_area white_case_study">
            <div class="patrn_1 d-none d-lg-block">
                <img src="<?= base_url() ?>seogo/img/pattern/patrn_1.png" alt="">
            </div>
            <div class="patrn_2 d-none d-lg-block">
                <img src="<?= base_url() ?>seogo/img/pattern/patrn.png" alt="">
            </div>
            <div class="container">
                <div class="row posts">
                </div>
            </div>
        </div>
        <!-- <section class="brands-area">
            <div class="container">
                <div class="brand-wrap">
                    <div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
                        <div class="col single-brand">
                            <a href="#"><img class="mx-auto" src="<?= base_url()?>assets/img/bg1.png" alt=""></a>
                        </div>
                        <div class="col single-brand">
                            <a href="#"><img class="mx-auto" src="<?= base_url()?>assets/img/bg2.png" alt=""></a>
                        </div>
                        <div class="col single-brand">
                            <a href="#"><img class="mx-auto" src="<?= base_url()?>assets/img/bg3.png" alt=""></a>
                        </div>
                        <div class="col single-brand">
                            <a href="#"><img class="mx-auto" src="<?= base_url()?>assets/img/bg4.png" alt=""></a>
                        </div>
                        <div class="col single-brand">
                            <a href="#"><img class="mx-auto" src="<?= base_url()?>assets/img/bg5.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End brands Area -->

        <!-- start footer Area -->
        <!-- <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>About Me</h4>
                            <p>
                                We have tested a number of registry fix and clean utilities and present our top 3 list on our site for your convenience.
                            </p>
                            <p class="footer-text"> -->
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <!-- </div>
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
        </footer> -->
        <?php $this->load->view('template/footer') ?>
        <!-- End footer Area -->
        <?php $this->load->view('template/js') ?>
        <script>
          function nFormatter(num){
            if(num >= 100000000){
              return (num/100000000).toFixed(1).replace(/\.0$/,'') + 'G';
            }
            if(num >= 1000000){
              return (num/100000).toFixed(1).replace(/\.0$/,'') + 'M';
            }
            if(num >= 1000){
              return (num/1000).toFixed(1).replace(/\.0$/,'') + 'K';
            }
            return num;
          }
          $.ajax({
            url:"https://www.instagram.com/disperindagprovjatim?__a=1",
            type:'get',
            success:function(response){
              // $(".profile-pic").attr('src',response.graphql.user.profile_pic_url);
              // $(".name").html(response.graphql.user.full_name);
              // $(".biography").html(response.graphql.user.biography);
              // $(".username").html(response.graphql.user.username);
              // $(".number-of-posts").html(response.graphql.user.edge_owner_to_timeline_media.count);
              // $(".followers").html(nFormatter(response.graphql.user.edge_followed_by.count));
              // $(".following").html(nFormatter(response.graphql.user.edge_follow.count));
              posts = response.graphql.user.edge_owner_to_timeline_media.edges;
              posts_html = '';
              for(var i=0;i<posts.length/2;i++){
                link = posts[i].node.shortcode;
                url = posts[i].node.display_url;
                likes = posts[i].node.edge_liked_by.count;
                comments = posts[i].node.edge_media_to_comment.count;
                //posts_html += '<div class="col-md-4 equal-height"><img style="min-height:50px;background-color:#fff;width:100%" src="'+url+'"><div class="row like-comment"><div class="col-md-6">'+nFormatter(likes)+' LIKES</div><div class="col-md-6">'+nFormatter(comments)+' COMMENTS</div><div class="col-md-6">'+nFormatter(caps)+' COMMENTS</div></div></div>';
                posts_html += '<div class="col-lg-4 col-md-6"><div class="single_study text-center white_single_study"><div class="thumb"><a href="http://instagram.com/p/'+link+'"><img style="min-height:392px;" src="'+url+'" alt=""></a></div><div class="subheading white_subheading"><h4>'
                +nFormatter(likes)+' likes | comment '+nFormatter(comments)+' .... <a href="http://instagram.com/p/'+link+'">more</a></p></div></div></div>';
              }
              $(".posts").html(posts_html);
            }
          });
        </script>
        <script>
        var slideIndex = 0;
        showSlides();
        var slides,dots;

        function showSlides() {
          var i;
          slides = document.getElementsByClassName("mySlides");
          dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex> slides.length) {slideIndex = 1}
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 3000); // Change image every 8 seconds
        }

        function plusSlides(position) {
          slideIndex +=position;
          if (slideIndex> slides.length) {slideIndex = 1}
          else if(slideIndex<1){slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }

        function currentSlide(index) {
          if (index> slides.length) {index = 1}
          else if(index<1){index = slides.length}
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[index-1].style.display = "block";
          dots[index-1].className += " active";
        }
        </script>
    </body>
</html>
