
<!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading">Company Services</h3>
        </div>
      </div>
      <div class="row text-center">
        <?php foreach($katlayanan as $katlayanan1) { ?>
        
          <div class="col-md-3">
            <span class="fa-stack fa-4x">
              <a class="portfolio-link" data-toggle="modal" href="#servicesModal<?= $katlayanan1->id_katlayanan;?>">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
              </a>
            </span>
            <h4 class="service-heading"><?= $katlayanan1->nama_kategori;?></h4>
            <a class="btn btn-outline-warning" href="<?= base_url('layanan/read/'.$katlayanan1->id_katlayanan);?>" >More Details</a>
            <br>
            <br>
          </div>
        <!-- Modal 6 -->
        <div class="services-modal modal fade" id="servicesModal<?= $katlayanan1->id_katlayanan;?>" tabindex="-1" role="dialog" aria-hidden="true" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 mx-auto">
                    <div class="modal-body">
                      <!-- Project Details Go Here -->
                      <h2 class="text-uppercase"><?= $katlayanan1->nama_kategori;?></h2>
                      <p align="justify"><?= $katlayanan1->isi_katlayanan;?></p>
                      <ul class="list-inline">
                        <li>Date: January 2017</li>
                        <li>Client: Window</li>
                        <li>Category: Photography</li>
                      </ul>
                      <button class="btn btn-primary" data-dismiss="modal" type="button">
                        <i class="fas fa-times"></i>
                        &nbsp;Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
        
      </div>
    </div>
 </section> 
 <section class="py-5">
  </section>
  <!-- About -->
  <section class="bg-light page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About Us</h2>
          <h3 class="section-subheading">More info for our company</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?= base_url('assets/upload/image/company/'.$gambarcon);?>">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Profile</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted" style="font-style:italic"><?= $deskripsi;?></p>
                  <a class="btn btn-outline-warning" href="#">More Details</a>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?= base_url();?>assets/template2/img/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Our Team</h4>
                </div>
                <div class="timeline-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  <a class="btn btn-outline-warning" href="<?= base_url();?>berita/read">More Details</a>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?= base_url();?>assets/template2/img/about/3.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Portofolio</h4>
                </div>
                <div class="timeline-body">
                  <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  <a class="btn btn-outline-warning" href="#">More Details</a>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?= base_url();?>assets/template2/img/about/4.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Our Partner</h4>
                </div>
                <div class="timeline-body">
                  <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  <a class="btn btn-outline-warning" href="#">More Details</a>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5">
  </section>
  <!-- Portfolio Grid -->
  <section class="bg-light page-section" id="galeri">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Gallery EBC</h2>
          <h3 class="section-subheading text-muted">Captures For Our Activity</h3>
        </div>
      </div>
      <div class="row text-center">
        <?php foreach($galeri as $galeri1) { ?>
        <div class="col-md-3 col-sm-3 portfolio-item">
          <a  data-toggle="lightbox" data-gallery="gallery" href="<?= base_url('assets/upload/image/galeri/'.$galeri1->gambar);?>"data-footer="<?= $galeri1->caption;?>">
            <img src="<?= base_url('assets/upload/image/thumbs/galeri/'.$galeri1->gambar);?>" class="img-fluid" alt="<?= $galeri1->caption;?>">
          </a>
          <br>
          <br>
        </div>
        <?php }?>
      </div>
    </div>
  </section>
  <section class="py-5">
  </section>
  <!-- Team -->
  <section class="bg-light page-section" id="news">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Enviro Buana Cipta News</h2>
          <h3 class="section-subheading text-muted">Some News On Enviro Buana Cipta.</h3>
        </div>
      </div>
      <div class="row">
        <?php foreach($berita as $berita2) { ?>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="<?= base_url('assets/upload/image/thumbs/news/'.$berita2->gambar);?>">
            <h4><?= $berita2->judul_berita;?></h4>
            <p class="text-muted"><?= character_limiter(strip_tags($berita2->isi_berita),200);?></p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a data-toggle="modal" href="#newsmodal<?= $berita2->id_berita;?>">
                  <i class="fab fa-readme"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="portfolio-modal modal fade" id="newsmodal<?= $berita2->id_berita;?>" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 mx-auto">
                      <div class="modal-body">
                        <!-- Project Details Go Here -->
                        <h2 class="text-uppercase"><?= $berita2->judul_berita;?></h2>
                        <img class="img-fluid d-block mx-auto" src="<?= base_url('assets/upload/image/thumbs/news/'.$berita2->gambar);?>" alt="<?= $berita2->judul_berita;?>">
                        <br>
                        <p align="justify"><?= $berita2->isi_berita;?></p>
                        <ul class="list-inline">
                          <li>Date: <?= date('d M Y', strtotime($berita2->tanggal_post));?></li>
                          <li>Publisher: <?= $berita2->nama;?></li>
                          <li>Category: <?=$berita2->nama_kategori;?></li>
                        </ul>
                        <button class="btn btn-primary" data-dismiss="modal" type="button">
                          <i class="fas fa-times"></i>
                          &nbsp;Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <a class="btn btn-outline-warning" href="<?= base_url();?>berita">More Details</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Clients -->
  <section class="py-5">
  </section>
  <!-- Team -->
  <!--<section class="bg-light page-section" id="team">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--      <div class="col-lg-12 text-center">-->
  <!--        <h2 class="section-heading text-uppercase">Our Amazing Team</h2>-->
  <!--        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--    <div class="row">-->
  <!--      <div class="col-sm-4">-->
  <!--        <div class="team-member">-->
  <!--          <img class="mx-auto rounded-circle" src="<?= base_url();?>assets/template2/img/team/1.jpg" alt="">-->
  <!--          <h4>Kay Garland</h4>-->
  <!--          <p class="text-muted">Lead Designer</p>-->
  <!--          <ul class="list-inline social-buttons">-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-twitter"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-facebook-f"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-linkedin-in"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--          </ul>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="col-sm-4">-->
  <!--        <div class="team-member">-->
  <!--          <img class="mx-auto rounded-circle" src="<?= base_url();?>assets/template2/img/team/2.jpg" alt="">-->
  <!--          <h4>Larry Parker</h4>-->
  <!--          <p class="text-muted">Lead Marketer</p>-->
  <!--          <ul class="list-inline social-buttons">-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-twitter"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-facebook-f"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-linkedin-in"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--          </ul>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="col-sm-4">-->
  <!--        <div class="team-member">-->
  <!--          <img class="mx-auto rounded-circle" src="<?= base_url();?>assets/template2/img/team/3.jpg" alt="">-->
  <!--          <h4>Diana Pertersen</h4>-->
  <!--          <p class="text-muted">Lead Developer</p>-->
  <!--          <ul class="list-inline social-buttons">-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-twitter"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-facebook-f"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="list-inline-item">-->
  <!--              <a href="#">-->
  <!--                <i class="fab fa-linkedin-in"></i>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--          </ul>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--    <div class="row">-->
  <!--      <div class="col-lg-8 mx-auto text-center">-->
  <!--        <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</section>-->

  <!-- Clients -->
  <!--<section class="py-5">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--      <div class="col-md-3 col-sm-6">-->
  <!--        <a href="#">-->
  <!--          <img class="img-fluid d-block mx-auto" src="<?= base_url();?>assets/template2/img/logos/envato.jpg" alt="">-->
  <!--        </a>-->
  <!--      </div>-->
  <!--      <div class="col-md-3 col-sm-6">-->
  <!--        <a href="#">-->
  <!--          <img class="img-fluid d-block mx-auto" src="<?= base_url();?>assets/template2/img/logos/designmodo.jpg" alt="">-->
  <!--        </a>-->
  <!--      </div>-->
  <!--      <div class="col-md-3 col-sm-6">-->
  <!--        <a href="#">-->
  <!--          <img class="img-fluid d-block mx-auto" src="<?= base_url();?>assets/template2/img/logos/themeforest.jpg" alt="">-->
  <!--        </a>-->
  <!--      </div>-->
  <!--      <div class="col-md-3 col-sm-6">-->
  <!--        <a href="#">-->
  <!--          <img class="img-fluid d-block mx-auto" src="<?= base_url();?>assets/template2/img/logos/creative-market.jpg" alt="">-->
  <!--        </a>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</section>-->

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contact Us</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>