<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <link rel="stylesheet" type="text/css" href="CSS/web_css.css">  
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!--<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js"></script>-->
    <script src="https://wlada.github.io/vue-carousel-3d/js/carousel-3d.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"
        integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/swiper@6.4.8/swiper-bundle.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/swiper@6.4.8/swiper-bundle.min.css">
        <link rel="icon" href="data:,">
      
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js"></script>-->
        <script src="https://wlada.github.io/vue-carousel-3d/js/carousel-3d.umd.js"></script>
    
</head>
<body class="mp0">
    <div class="complete_container flx_col" id="home">
        <div id="video-modal" class="modal">
        </div>
        <div class="navbar flx_row user_none">
            <div class="Hlogo">
                <a href="https://publisherplex.io/selfserve/home/web.php">
                    <img src="https://s.hcurvecdn.com/selfserve/icons/logohc.webp" height="54px" width="300px">
                </a>
            </div>
            <div class="options flx_row">
                <div class="nav-link"><a href="#home">Home</a></div>
                <div class="dropdown nav-link"><a class="dropbtn" href="#about_us">About Us</a>
                    <div class="dropdown-content">
                        <a href="https://publisherplex.io/selfserve/home/optout.php">Optout</a>
                        <a href="https://publisherplex.io/selfserve/home/privacy.php">Privacy Policy</a>
                    </div>
                </div>
                <div class="nav-link"><a href="#achive_container">achivements</a></div>
                <div class="nav-link"><a href="#selfserve">Self Serve Tool</a></div>
                <div class="nav-link"><a href="#contact">Contact Us</a></div>
            </div>
            <div class="menu-wrap">
                <input type="checkbox" id="check" class="toggler">
                <div class="hamburger">
                    <div></div>
                </div>
                <div class="menu">
                    <div>
                        <div>
                            <ul>
                                <li><a href="#home" onclick="menu()">Home</a></li>
                                <li><a href="#about_us" onclick="menu()">About Us</a></li>
                                <li><a href="#achive_container" onclick="menu()">achivements</a></li>
                                <li><a href="#selfserve" onclick="menu()">Self Serve Tool</a></li>
                                <li><a href="https://publisherplex.io/selfserve/home/optout.php">Optout</a></li>
                                <li><a href="https://publisherplex.io/selfserve/home/privacy.php">Privacy Policy</a></li>
                                <li><a href="#contact" onclick="menu()">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="showcase" class="about_us_container flx_col user_none">
            <div class="flx_row para_vid">
                <div class="btn_copy_content flx_col">
                    <div class="colorblack">Worlds</div>
                    <div class="colorblue">Largest Dynamic</div>
                    <div class="colorblue">Creative Library</div>
                    <div class="cta" id="ctaforanim">
                        <a href="https://publisherplex.io/selfserve/home/comingsoon.html" target="_blank">
                            <div class="cta-btn" data-aos="zoom-in" data-aos-once="true">
                                <h3 class="cta-text" data-aos="fade-down" data-aos-delay="100" data-aos-once="true">
                                    VISIT LIBRARY</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="img_vid_content" id="vidcontent">
                    <img src="https://s.hcurvecdn.com/selfserve/icons/tab2.webp">
                    <img src="https://s.hcurvecdn.com/selfserve/icons/playbtn2.webp" class="play_abs" id="onplay" onclick="openVid()">
                </div>
            </div>
            <div class="ab_us flx_col" id="about_us">
                <div class="about_hrading colorblue">
                    About Us
                </div>
                <div class="para colorblack">
                    Hockeycurve's Revolutionary Predictive Communication Engine uses Big Data & Artificial Intelligence to profile & identify high intent consumers & delivers dynamically created bespoke experiences to each one of them across devices.
                </div>
                <div class="lets_btn" id="ctaforanim">
                    <a href="https://publisherplex.io/selfserve/login.php" target="_blank">
                        <div class="let-btn" data-aos="zoom-in" data-aos-once="true">
                            <h3 class="btn-text" data-aos="fade-down" data-aos-delay="100" data-aos-once="true">
                                LET'S CREATE AN AD</h3>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="swipe_card_container">
          <div id="usp_head_container">
            <div class="first_box">
              <p>Enterprise <br> Marketing <br> Automation</p>
            </div>
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="img-box">
                    <div class="partol">
                      <div class="extra_div">
                        <h2 class="head_in">DYNAMIC AD SERVING</h2>
                      </div>
                      <img class="call_me_gif" src="https://s.hcurvecdn.com/selfserve/icons/DYNAMICADSERINGcreone.gif" alt="">
                      <div class="paramount">
                        <p class="para_in">Brands use this to create & show data based relevant ads to
                          users in real
                          time improve marketing ROI.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="img-box">
                    <div class="partol">
                      <div class="extra_div">
                        <h2 class="head_in">RECOMMENDATION ENGINE</h2>
                      </div>
                      <img class="call_me_gif" src="https://s.hcurvecdn.com/selfserve/icons/RECOMMENDATONENGINEcreone.gif" alt="">
                      <div class="paramount">
                        <p class="para_in">Generate User product feed based on his online and offline
                          activity</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="img-box">
                    <div class="partol">
                      <div class="extra_div">
                        <h2 class="head_in">DYNAMIC CREATIVES</h2>
                      </div>
                      <img class="call_me_gif" src="https://s.hcurvecdn.com/selfserve/icons/DYNAMICCREATIVEScreone.gif" alt="">
                      <div class="paramount">
                        <p class="para_in">Every user is unique, hence every ad for every users should
                          be unique.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="img-box">
                    <div class="partol">
                      <div class="extra_div">
                        <h2 class="head_in">PROGRAMATIC MEDIA BUYING</h2>
                      </div>
                      <img class="call_me_gif" src="https://s.hcurvecdn.com/selfserve/icons/prgmbuying.gif" alt="">
                      <div class="paramount">
                        <p class="para_in">Media Buying Automation for Bringing Speed, Scale & Driving
                          Performance</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="img-box">
                    <div class="partol">
                      <div class="extra_div">
                        <h2 class="head_in">ENTERPRISE ANALYTICS</h2>
                      </div>
                      <img class="call_me_gif" src="https://s.hcurvecdn.com/selfserve/icons/ENTERPRISEANALYTICScreone.gif" alt="">
                      <div class="paramount">
                        <p class="para_in">We provide real time campaign performance dashboards, a/b
                          testing
                          environments.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="img-box">
                    <div class="partol">
                      <div class="extra_div">
                        <h2 class="head_in">CONSULTING</h2>
                      </div>
                      <img class="call_me_gif" src="https://s.hcurvecdn.com/selfserve/icons/CONSULTINGcreone.gif" alt="">
                      <div class="paramount">
                        <p class="para_in">On Demand Access to Strategic Domain Experts for Programmatic
                          Setup.</p>
      
                      </div>
      
                    </div>
                  </div>
                </div>
              </div>
              <!-- Add Pagination -->
              <div class="swiper-right-btn"><img style="position: absolute;top: 200px;left: 0px;height: 40px;z-index: 99;cursor: pointer;" src="https://s.hcurvecdn.com/selfserve/icons/leftarrow2.webp" alt=""></div>
              <div class="swiper-left-btn"><img style="position: absolute;top: 200px;right: 0px;height: 40px;z-index: 99;cursor: pointer;" src="https://s.hcurvecdn.com/selfserve/icons/rightarrow2.webp" alt=""></div>
            </div>
          </div>
        </section>
        <section id="wh_dco" class="dco_container flx_col colorblack">
            <div class="what_is_dco_content">
                <div class="para_gif_content flx_row">
                    <div class="wh_dco flx_col">
                        <div class="f_head">What Is <span class="colorblue">DCO?</span></div>
                        <div class="para1">
                            Dynamic Creative is simply any creative that changes automatically based on information about the user, whether this is related to their behavior, location or context.
                        </div>
                        <div class="para2">
                            <span class="colorblue">Variables : </span> Time, Device, Weather, Ad placement / contextual targeting, Location, bhavioral targeting, demographics, Retargeting Information.
                        </div>
                        <div class="lets_btn" id="ctaforanim">
                            <a href="https://publisherplex.io/selfserve/login.php" target="_blank">
                                <div class="let-btn" data-aos="zoom-in" data-aos-once="true">
                                    <h3 class="btn-text" data-aos="fade-down" data-aos-delay="100" data-aos-once="true">
                                        CREATE YOUR OWN AD</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div id="laptop" class="wh_dco_gif">
                            <div class="halfshow"  style="position:relative;">
                                <img class="halflapitopi" style="position:absolute;top:0;z-index:-1;" src="https://s.hcurvecdn.com/selfserve/icons/halftapitop.webp">
                                <img class="halflapitopi1" style="position:absolute;top:0;z-index:1;" src="https://s.hcurvecdn.com/selfserve/icons/halftapitop1.webp">
                                <img class="halflapitopi2" style="position:absolute;top:0;z-index:2;" src="https://s.hcurvecdn.com/selfserve/icons/halftapitop2.webp">
                                <img class="halflapitopi3" style="position:absolute;top:0;z-index:3;" src="https://s.hcurvecdn.com/selfserve/icons/halftapitop3.webp">
                                <img class="halflapitopi4" style="position:absolute;top:0;z-index:4;" src="https://s.hcurvecdn.com/selfserve/icons/halftapitop4.webp">
                                <img class="halflapitopi5" style="position:absolute;top:0;z-index:4;" src="https://s.hcurvecdn.com/selfserve/icons/halftapitop5.webp">
                                <img class="halflapitopi6" style="top:0;z-index:4;" src="https://s.hcurvecdn.com/selfserve/icons/halftapitop6.webp">
                             </div>
                    </div>
                </div>
            </div>
            <div class="why_dco_content">
                <div class="para_gif_content2 flx_row">
                    <div class="fororder">
                    
                    <div class="containeNRN ">
                         <img class="inmobpaper" style="position:absolute;"
                           src="https://s.hcurvecdn.com/selfserve/icons/inmobad.webp">
                         <img class="mobsty" style="position:absolute;" src="https://s.hcurvecdn.com/selfserve/icons/mobiletag.webp">
                         <div class="sideinfo">
                           <div>
                             <p class="databt1">Dynamic Date,<br> Time and Location</p>
                             <p class="databt2">User Swipe|Auto Swipe <br> Feed Based Carousal</p>
                           </div>
                         </div>
                         <div class="dashsty1">
                           <ul class="dashstyul">
                             <li>------------------</li>
                             <li class="lastli"></li>

                             </ul>
                           </div>
                           <div class="dashsty2">
                             <ul class="dashstyul">
                               <li>------------</li>

                     <li class="lastli"></li>
  
                     </ul>
                   </div>
          </div>
          
          </div>

                    <div class="why_dco flx_col">
                        <div class="s_head">Why <span class="colorblue">DCO?</span></div>
                        <div class="type flx_row">
                            <div class="banner" id="banner" data-aos="fade" data-aos-delay="10" data-aos-once="true">Banner Blindness does not stand a chance</div>
                            <div><img src="https://s.hcurvecdn.com/selfserve/icons/bulletpoints2.webp"></div>
                        </div>
                        <div class="type flx_row">
                            <div data-aos="fade" data-aos-delay="20" data-aos-once="true">Personalized and customized<br>communication for all</div>
                            <div><img src="https://s.hcurvecdn.com/selfserve/icons/bulletpoints2.webp"></div>
                        </div>
                        <div class="type flx_row">
                            <div data-aos="fade" data-aos-delay="30" data-aos-once="true">power & the ability to convince<br>the user to transact</div>
                            <div><img src="https://s.hcurvecdn.com/selfserve/icons/bulletpoints2.webp"></div>
                        </div>
                        <div class="type flx_row">
                            <div data-aos="fade" data-aos-delay="40" data-aos-once="true">Increases relevance and relatability</div>
                            <div><img src="https://s.hcurvecdn.com/selfserve/icons/bulletpoints2.webp"></div>
                        </div>
                        <div class="type flx_row salesbtn" id="salesbtn">
                            <a href="#contact">
                                <div class="cta-btn" data-aos="zoom-in" data-aos-once="true">
                                    <h3 class="cta-text" data-aos="fade-down" data-aos-delay="100" data-aos-once="true">
                                        CONTACT SALES TEAM</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="achive_container" style="height: 470px;">
            <div class="blue_bg">
                <div class="inner_piece">
                    <div class="achive_head">
                        <h2 data-aos="zoom-in" data-aos-once="true">OUR ACHIEVEMENTS</h2>
                    </div>
                    <div style="display: flex;align-items: center;justify-content: center;flex-direction: row;">
                        <div class="comman_class" style="margin-right: 35px;">
                            <div id="counter">
                                <div class="counter-value number_count" data-count="80">0 </div>
                            </div>
                            <div>
                                <p data-aos="zoom-in" data-aos-once="true" class="plus" style="position: relative;top: 5px;font-family: 'Montserrat';font-weight:800;font-size: 45px;">
                                    +</p>
                                <p class="cl" style="position: relative;top: -10px;" data-aos="zoom-in" data-aos-once="true">CLIENTS</p>
                            </div>
                        </div>
                        <div class="comman_class">
                            <div id="counter">
                                <div class="counter-value number_count" data-count="100">0 </div>
                            </div>
                            <div>
                                <p class="plus" style="position: relative;top: 5px;font-family: 'Montserrat';font-weight:800;font-size: 45px;" data-aos="zoom-in" data-aos-once="true">
                                    +</p>
                                <p class="cl" style="position: relative;top: -10px;" ata-aos="zoom-in" data-aos-once="true">PROJECTS</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-items">
                        <div class="inner-box">
                            <img src="https://s.hcurvecdn.com/selfserve/icons/ctrincrmnt.gif" class="img_inner_box" alt="">
                            <div class="ctr_rating forall">
                                <div id="counter">
                                    <div style="margin: 10px 0px;"><span class="counter-value pic_count"
                                            data-count="230">0 </span><span class="pic_count">%
                                        </span>
                                        <p class="img_tags_para">CTR Increase</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inner-box"><img src="https://s.hcurvecdn.com/selfserve/icons/performroii.gif" class="img_inner_box" alt="">
                            <div class="perform_roi forall">
                                <div id="counter">
                                    <div style="margin: 10px 0px;"><span class="counter-value pic_count"
                                            data-count="3">0 </span><span class="pic_count">X
                                        </span>
                                        <p class="img_tags_para">Performance ROI</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inner-box"><img src="https://s.hcurvecdn.com/selfserve/icons/saliftfs.gif" class="img_inner_box" alt="">
                            <div class="user_tracked forall">
                                <div id="counter">
                                    <div style="margin: 10px 0px;"><span class="counter-value pic_count"
                                            data-count="200">0 </span><span class="pic_count">M
                                        </span>
                                        <p class="img_tags_para">Users Tracked <br>Per Month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inner-box"><img src="https://s.hcurvecdn.com/selfserve/icons/ustrafmonth.gif" class="img_inner_box" alt="">
                            <div class="sale_lift forall">
                                <div id="counter">
                                    <div style="margin: 10px 0px;"><span class="pic_count">+</span> <span
                                            class="counter-value pic_count" data-count="15">0
                                        </span><span class="pic_count">%
                                        </span>
                                        <p class="img_tags_para">Sales lift for clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="client_use">
            <h2 class="clients_head" data-aos="zoom-in" data-aos-once="true"><span style="color: #43494a">Advertisers who have experienced</span><span
                    style="display: block;color: #2096f3;">our
                    product
                    offerings</span>
            </h2>

            <div class="marquee-full-width">
                <div class="marquee-box">
                  <div class="marquee">
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo1.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo2.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo3.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo4.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo5.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo6.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo7.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo8.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo9.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo10.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo11.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo12.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo1.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo2.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo3.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo4.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo5.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo6.webp" alt="featured creator">
                    </figure>
                  </div>
                  <div class="marquee">
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo7.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo8.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo9.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo10.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo11.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo12.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo1.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo2.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo3.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo4.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo5.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo6.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo7.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo8.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo9.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo10.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo11.webp" alt="featured creator">
                    </figure>
                    <figure>
                      <img src="https://s.hcurvecdn.com/selfserve/icons/hlogo12.webp" alt="featured creator">
                    </figure>
                  </div>
                </div>
              </div>
        </section>
        <section id="selfserve">
            <div class="self-container">
                <div class="abs_self" data-aos="zoom-in-up" data-aos-duration="200" data-aos-delay="100"
                data-aos-easing="linear" data-aos-once="true">
                              <img class="f1main" style="z-index:1;"
                                src="https://s.hcurvecdn.com/selfserve/icons/totobg.webp">
                              <img class="f1data" style="position:absolute;z-index:1;"
                                src="https://s.hcurvecdn.com/selfserve/icons/poweroi1.webp">
                              <img class="f2data" style="position:absolute;z-index:2;"
                                src="https://s.hcurvecdn.com/selfserve/icons/poweroi2.webp">
                              <img class="f3data" style="position:absolute;z-index:3;"
                                src="https://s.hcurvecdn.com/selfserve/icons/poweroi3.webp">
                              <img class="f4data" style="position:absolute;z-index:4;"
                                src="https://s.hcurvecdn.com/selfserve/icons/poweroi4.webp">
                              <img class="f5data" style="position:absolute;z-index:7;"
                                src="https://s.hcurvecdn.com/selfserve/icons/poweroi5.webp">
                              <img class="f6data" style="position:absolute;z-index:6;"
                                src="https://s.hcurvecdn.com/selfserve/icons/poweroi6.webp">
                              <img class="f7data" style="position:absolute;z-index:7;"
                                src="https://s.hcurvecdn.com/selfserve/icons/poweroi7.webp">
                </div>
                <div class="selfwrap">
                <div class="self-title" data-aos="fade-down" data-aos-duration="1000" data-aos-once="true">
                    <h4>Create a Dynamic High Quality HTML ad in Few Minutes</h4>
                </div>
                <div class="steps">
                    <div class="step" data-aos="zoom-in" data-aos-once="true">
                          <div id="mainnewLAPDIV" style="position:relative;">
                              <img class="mainnewLAP1" style="position:absolute;z-index:-1;" src="https://s.hcurvecdn.com/selfserve/icons/mainnewLAP.webp">
                              <img class="mainnewLAP2" style="position:absolute;z-index:1;" src="https://s.hcurvecdn.com/selfserve/icons/mainnewLAP2.webp">
                              <img class="mainnewLAP3" style="position:absolute;z-index:2;" src="https://s.hcurvecdn.com/selfserve/icons/mainnewLAP3.webp">
                              <img class="mainnewLAP4" style="position:absolute;z-index:3;" src="https://s.hcurvecdn.com/selfserve/icons/mainnewLAP4.webp">
                              <img class="mainnewLAP5" style="z-index:4;" src="https://s.hcurvecdn.com/selfserve/icons/mainnewLAP5.webp">

                          </div>
                        <p class="step-text" data-aos="fade-down" data-aos-once="true">Start creating customizable online ads with our advertisements maker</p>
                    </div>
                    <div class="step" data-aos="zoom-in" data-aos-once="true">
                          <div id="astabgGREDIV" style="position:relative;">
                              <img class="bgsalt" style="position:absolute;z-index:-1;" src="https://s.hcurvecdn.com/selfserve/icons/creative2bg.webp">
                              <img class="ast1" style="position:absolute;z-index:1;" src="https://s.hcurvecdn.com/selfserve/icons/creative2-1.webp">
                              <img class="ast2" style="position:absolute;z-index:2;" src="https://s.hcurvecdn.com/selfserve/icons/creative2-2.webp">
                              <img class="ast3" style="position:absolute;z-index:3;" src="https://s.hcurvecdn.com/selfserve/icons/creative2-3.webp">
                              <img class="ast4" style="position:absolute;z-index:4;" src="https://s.hcurvecdn.com/selfserve/icons/creative2-4.webp">
                              <img class="ast5" style="z-index:4;" src="https://s.hcurvecdn.com/selfserve/icons/creative2-5.webp">
                         </div>
                        <p class="step-text" data-aos="fade-down" data-aos-once="true">Create a Dynamic ad with various categories of Ad Format types</p>
                    </div>
                    <div class="step" data-aos="zoom-in" data-aos-once="true">
                          <div id="analyticGRILDIV"  style="position:relative;">
                                <img class="analyticGRIL" style="position:absolute;top:0;z-index:-1;" src="https://s.hcurvecdn.com/selfserve/icons/analyticsgrali.webp">
                                <img class="analyticGRIL2" style="position:absolute;top:0;z-index:1;" src="https://s.hcurvecdn.com/selfserve/icons/analyticsgrali2.webp">
                                <img class="analyticGRIL3" style="position:absolute;top:0;z-index:2;" src="https://s.hcurvecdn.com/selfserve/icons/analyticsgrali3.webp">
                                <img class="analyticGRIL4" style="top:0;z-index:3;" src="https://s.hcurvecdn.com/selfserve/icons/analyticsgrali4.webp">
                            </div>
                        <p class="step-text" data-aos="fade-down" data-aos-once="true">Ideal for Marketers, Small business owners and creative agencies</p>
                    </div>
                </div>
                <div class="cta" id="ctaforanim">
                  <a href="https://publisherplex.io/selfserve/login.php" target="_blank"><div class="cta-btn" data-aos="zoom-in" data-aos-once="true">
                        <h3 class="cta-text" data-aos="fade-down" data-aos-delay="100" data-aos-once="true">LET'S CREATE AD</h3>
                    </div></a>
                </div>
                <div class="icons">
                    <div class="icon icon1">
                        <img src="https://s.hcurvecdn.com/selfserve/icons/icon11.webp" alt="icon1">
                    </div>
                    <div class="icon icon2" data-aos="fade-up-right" data-aos-delay="500" data-aos-once="true">
                        <img src="https://s.hcurvecdn.com/selfserve/icons/icon22.webp" alt="icon2">
                    </div>
                    <div class="icon icon3">
                        <img src="https://s.hcurvecdn.com/selfserve/icons/icon33.webp" alt="icon3">
                    </div>
                </div>
              </div>
            </div>
        </section>
        
        
            <h2 class="head_testm" data-aos="fade-in-up" data-aos-once="true">TESTIMONIALS</h2>
      <div class="marbales">
            <div class="swiper-wrapper">
                <div class="swiper-slide ping_dom">
                    <div class="testimonials">
                        <div class="top_info">
                            <div class="sub_info" style="margin: 3px 12px;">
                                <img class="face_img" src="https://s.hcurvecdn.com/selfserve/icons/shyam.webp" alt="">
                            </div>
                            <div class="extramoreDIV">
                                <p class="test_name">Shyam Kumar, Associate Director, Flipkart</p>
                                <img class="test_img" src="https://s.hcurvecdn.com/selfserve/icons/4stars2.webp" alt="">
                            </div>
                        </div>
                        <div class="DIVforPARA">
                            <p class="para_on_para">"
                                HockeyCurve is ROI focused dynamic creative partner. They setup the dynamic creative
                                architecture that delivered the
                                necessary performance targets. I was impressed with the minimal client involvement
                                required in setup. Its fully
                                automated & optimizes to achieve performance targets."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide ping_dom">
                    <div class="testimonials">
                        <div class="top_info">
                            <div class="sub_info" style="margin: 3px 12px;">
                                <img class="face_img" src="https://s.hcurvecdn.com/selfserve/icons/jacinto.webp" alt="">
                            </div>
                            <div class="extramoreDIV">
                                <p class="test_name">Jacinto Fernandes, Marketing Head, Universal Pictures India</p>
                                <img class="test_img" src="https://s.hcurvecdn.com/selfserve/icons/4stars2.webp" alt="">
                            </div>
                        </div>
                        <div class="DIVforPARA">
                            <p class="para_on_para">
                                "We deployed HockeyCurve creative setup for our movie marketing campaigns. As compared
                                to
                                historical numbers our
                                marketing campaigns saw a significant improvement in performance. I wish
                                HockeyCurve
                                team all the best."
                            </p>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="testimonials">
                        <div class="top_info">
                            <div class="sub_info" style="margin: 3px 12px;">
                                <img class="face_img" src="https://s.hcurvecdn.com/selfserve/icons/arpit.webp" alt="">
                            </div>
                            <div class="extramoreDIV">
                                <p class="test_name">Arpit Awasthi, Senior Manager, Voot</p>
                                <img class="test_img" src="https://s.hcurvecdn.com/selfserve/icons/4stars2.webp" alt="">
                            </div>
                        </div>
                        <div class="DIVforPARA">
                            <p class="para_on_para">
                                "Hockeycurve Performed for us at scale. With HockeyCurve creatives we scaled our
                                campaigns 10X with significant
                                improvement in performance. The product is completely customizable and can be maneuvered
                                with advertisers growing needs.
                                One thing that every advertiser dreams of."
                            </p>
                        </div>
                    </div>
                </div>



                <!-- Add Pagination -->
                <div class="swiper-right-btn"><img
                        style="position: absolute;top: 200px;left: 0px;height: 40px;z-index: 99;"
                        src="/Icons/leftarrow.png" alt=""></div>
                <div class="swiper-left-btn"><img
                        style="position: absolute;top: 200px;right: 0px;height: 40px;z-index: 99;"
                        src="/Icons/rightarrow.png" alt=""></div>
            </div>
        </div>
      
        <footer id="footer">
            <div class="nav-menu flx_row" style="text-transform: uppercase;">
                <div><a href="#home">HOME</a></div>
                <div><a href="#about_us">ABOUT US</a></div>
                <div><a href="#achive_container">achivements</a></div>
                <div><a href="#selfserve">SELF SERVE TOOL</a></div>
                <div><a href="#contact">CONTACT US</a></div>
            </div>
            <form id="contact" method="POST" action="">
                <h3 class="form-title">REACH US</h3>
                <p id="err"></p>
                <input type="text" name="name" placeholder="Name" id="usname" required>
                <input type="text" name="agency" placeholder="Agency Name" id="agname" required>
                <input type="email" name="email" placeholder="Email ID" id="usemail" required>
                <input type="tel" name="number" placeholder="Phone Number" id="usnum" required>
                <div class="ctaparent"><button type="submit" name="submit" onclick="valid()" class="cta-text" id="ctaofooter"> CONTACT US</button></div>
            </form>
            <p class="foot-text">&copy; HOCKEYCURVE GROWTH SOLUTIONS PVT LTD <span id="year"></span></p>
        </footer>


    </div>
<script src="JavaScript/web_js.js"></script>    
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

<?php 
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $agency=$_POST['agency'];
    $number=$_POST['number'];
    $email=$_POST['email'];

     
    $to ='jasmeet.singh@hockeycurve.com,pavan.vichare@hockeycurve.com';
    $message = "Hello team, <br> \r\n\r\n";

    $message .="$name from $agency wants to connect.<br><br> \r\n\r\n";
   
    $message .="<b> PFB the person's mail id and mobile number <br><br></b>\r\n\r\n";
   
    $message .="<b>Email - $email<br><br></b> \r\n\r\n";
   
    $message .="<b>Number - $number<br><br></b> \r\n\r\n";
   

     $subject = 'Help request' ;
     $header = "From:bizops@hockeycurve.com \r\n";
     $header .= "MIME-Version: 1.0\r\n";
                 $header .= "Content-type: text/html\r\n";

                     
                     $retval = mail ($to,$subject,$message,$header);

 header("Location: https://publisherplex.io/selfserve/home/thankyou.html");
}

?>

</html>


