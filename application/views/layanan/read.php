<!-- Services -->
  <section class="bg-light page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading">Company Services</h3>
        </div>
      </div>
      <div class="row text-center">
        <?php foreach($layanan as $layanan) { ?>
          <?php  if($layanan->id_katlayanan == $this->uri->segment(3)){ ?>
          <div class="col-md-3">
            <a class="portfolio-link" data-toggle="modal" href="#servicesModal<?= $layanan->id_layanan;?>">
              <div class="team-member">
              <img class="mx-auto rounded-circle" src="<?= base_url('assets/upload/image/thumbs/services/'.$layanan->gambar);?>" alt="<?= $layanan->judul_layanan;?>">
              </div>
            </a>
            <h4 class="service-heading"><?= $layanan->judul_layanan;?></h4>
            <p class="text-muted"><?= $layanan->nama_kategori;?></p>
            <br>
            <br>
          </div>
        <!-- Modal 6 -->
        <div class="services-modal modal fade" id="servicesModal<?= $layanan->id_layanan;?>" tabindex="-1" role="dialog" aria-hidden="true" >
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
                      <h2 class="text-uppercase"><?= $layanan->judul_layanan;?></h2>
                      <img class="img-fluid d-block mx-auto" src="<?= base_url('assets/upload/image/thumbs/services/'.$layanan->gambar);?>" alt="<?= $layanan->judul_layanan;?>">
                      <br>
                      <p align="justify"><?= $layanan->isi_layanan;?></p>
                      <ul class="list-inline">
                        <li>Date: January 2017</li>
                        <li>Client: Window</li>
                        <li>Category: <?=$layanan->nama_kategori;?></li>
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
      <?php }} ?>
        
      </div>
    </div>
 </section> 
