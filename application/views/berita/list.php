<!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">My Blog</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Profesional Blog Page</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="page-head-blog">
            <!-- <div class="single-blog-page">
              
              <form action="#">
                <div class="search-option">
                  <input type="text" placeholder="Search...">
                  <button class="button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                </div>
              </form>
            </div> -->
            <div class="single-blog-page">
              <div class="left-blog">
                <h4>categories</h4>
                <ul class="project-berita">
                  <li>
                    <a href="#" class="active" data-filter="*">All</a>
                  </li>
                  <?php foreach($katberita as $katberita) { ?>
                  <li>
                  <a href="#" data-filter=".<?= $katberita->id_katberita?>"><?= $katberita->nama_kategori;?></a>
                  </li>
                 <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 awesome-project-content">
              <?php foreach($berita as $berita) { ?>
              <div class="single-blog active <?= $berita->id_katberita;?>">
                <div class="single-blog-img">
                  <img src="<?= base_url('assets/upload/image/thumbs/news/'.$berita->gambar);?>" alt="">
                </div>
                <div class="blog-meta">
                  <span class="comments-type">
                      <i class="fa fa-user-circle-o"></i>
                      <a href="#"><?= $berita->nama;?></a>
                    </span>
                  <span class="date-type">
                      <i class="fa fa-calendar"></i><?= date('d M Y', strtotime($berita->tanggal_post));?>
                    </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <p><strong><?= $berita->judul_berita;?></strong></p>
                  </h4>
                  <p>
                    <?= character_limiter(strip_tags($berita->isi_berita),200);?>
                  </p>
                </div>
                <span>
                    <a href="<?= base_url('berita/read/'.$berita->id_berita);?>" class="ready-btn">Read more</a>
                  </span>
              </div>
              <?php } ?>
            </div>
            <!-- End single blog -->
            <div class="blog-pagination">
              <ul class="pagination">
                <li><a href="#">&lt;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->

  <div class="clearfix"></div>

