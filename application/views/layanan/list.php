 <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle">
                        <p>home . services</p>
                        <h2><?= $title; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_project part start-->
    <section class="our_project section_padding" id="portfolio">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-2">
            <div class="section_tittle">
           
              <h2>Our Services</h2>
            </div>
          </div>
          <div class="col-lg-10 col-md-9">
            <div class="filters portfolio-filter project_menu_item">
              <ul>
                <li class="active" data-filter="*">All</li>
                <li data-filter=".environtment">ENVIRONMENT MONITORING</li>
                <li data-filter=".emision">EMISSION TEST EQUIPMENT</li>
                <li data-filter=".eco">ECODRIVING RALLY</li>
                <li data-filter=".drivetrain">DRIVING TRAINING</li>
              </ul>
            </div>
          </div>
          <!-- <div class="col-lg-3 col-md-6">
            <div class="more_btn d-none d-md-block">
              <a href="#" class="more_btn_iner">more projects</a>
            </div>
          </div> -->
        </div>
        <div class="filters-content">
          <div class="row justify-content-between portfolio-grid">
            <div class="col-lg-4 col-sm-4 all environtment">
              <div class="single_our_project">
                <div class="single_offer">
                  <a href="<?= base_url(); ?>assets/template/img/project_1.png" class="popup-youtube"><img src="<?= base_url(); ?>assets/template/img/project_1.png" alt="offer_img_1" /></a>
                  <div class="hover_text">
                    <p>ENVIRONMENT MONITORING</p>
                    <a href="<?= base_url();?>layanan/read"><h2>VEHICLE EMISSION TESTING</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all environtment">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_2.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>ENVIRONMENT MONITORING</p>
                    <a href="<?= base_url();?>layanan/read"><h2>TRAFFIC COUNTING SURVEY</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all environtment">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_3.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>ENVIRONMENT MONITORING</p>
                    <a href="<?= base_url();?>layanan/read"><h2>AMBIENT / ROADSIDE MONITORING</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all environtment">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_4.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>ENVIRONMENT MONITORING</p>
                    <a href="<?= base_url();?>layanan/read"><h2>ENVIRONMENTAL STUDY / DOCUMENT</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all emision">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_5.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>EMISSION TEST EQUIPMENT</p>
                    <a href="<?= base_url();?>layanan/read"><h2>SALES</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all emision">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_5.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>EMISSION TEST EQUIPMENT</p>
                    <a href="<?= base_url();?>layanan/read"><h2>SERVICES</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all emision">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_5.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>EMISSION TEST EQUIPMENT</p>
                    <a href="<?= base_url();?>layanan/read"><h2>CALIBRATIONS</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all eco">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_6.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>EcoDriving Rally</p>
                    <a href="<?= base_url();?>layanan/read"><h2>FUN RALLY ECO DRIVING</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all drivetrain">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_6.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>DRIVING TRAINING</p>
                    <a href="<?= base_url();?>layanan/read"><h2>DEFENSIVE DRIVING</h2></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 all drivetrain">
              <div class="single_our_project">
                <div class="single_offer">
                  <img src="<?= base_url(); ?>assets/template/img/project_6.png" alt="offer_img_1" />
                  <div class="hover_text">
                    <p>DRIVING TRAINING</p>
                    <a href="<?= base_url();?>layanan/read"><h2>ECO DRIVING</h2></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <img src="<?= base_url(); ?>assets/template/img/animate_icon/icon_2.png" class="animation_icon_2" alt="">
    </section>
    <!-- our_project part end-->