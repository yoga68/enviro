<input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi->id_konfigurasi;?>">
<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user');?>">
  <div class="card-body">
<?php 
  $attribut = '';

  if(isset($error_upload)){
    echo '<div class="alert alert-warning">'.$error_upload.'</div>';
  }
  //form open
  echo form_open_multipart(base_url('admin/konfigurasi/configweb/'.$konfigurasi->id_konfigurasi), $attribut); 
?>
	<?php if($konfigurasi->logo != "") { ?>
			<a href="<?= base_url('assets/upload/image/company/'.$konfigurasi->logo);?>" data-toggle="lightbox" data-title="<?= $konfigurasi->namaweb; ?>">
		    <p align="center"><img src="<?= base_url('assets/upload/image/thumbs/company/'.$konfigurasi->logo);?>" class="img-responsive"></p>
		    </a>
		<?php }else{ ?>
			<p class="alert alert-danger text-center" align="center">Belum Ada Foto</p>
		<?php } ?>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-camera-retro"></i></span>
	    </div>
	      <input type="file" class="form-control" name="logo">	
    </div>
    <label>Company</label>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-home"></i></span>
      </div>
      <input type="text" class="form-control" name="namaweb" value="<?= $konfigurasi->namaweb;?>" readonly>
    </div>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
      </div>
      <input type="text" class="form-control" name="tagline" value="<?= $konfigurasi->tagline;?>">
    </div>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-book-reader"></i></span>
      </div>
      <textarea name="deskripsi" class="form-control"><?= $konfigurasi->deskripsi;?></textarea>
    </div>
    <label>Contact Us</label>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      <input type="text" class="form-control" name="email" value="<?= $konfigurasi->email;?>">
    </div>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone"></i></span>
      </div>
      <input type="text" class="form-control" name="telepon" value="<?= $konfigurasi->telepon;?>" placeholder="(021) 99-9999">
    </div>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
      </div>
      <input type="text" class="form-control" name="website" value="<?= $konfigurasi->website;?>" >
    </div>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
      </div>
      <input type="text" class="form-control" name="map" value="<?= $konfigurasi->map;?>" placeholder="Insert Link" >
    </div>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
      </div>
      <input type="text" class="form-control" name="instagram" value="<?= $konfigurasi->instagram;?>" placeholder="Insert Link" >
    </div>
    <label>Promotion</label>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fab fa-korvue">&nbsp;Keywords</i></span>
      </div>
      <input type="text" class="form-control" name="keywords" value="<?= $konfigurasi->keywords;?>" >
    </div>
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fab fa-strava">&nbsp;Metatext</i></span>
      </div>
      <input type="text" class="form-control" name="metatext" value="<?= $konfigurasi->metatext;?>" >
    </div>
  <div class="card-footer">
	<input type="submit" name="submit" class="btn btn-success" value="Save">
  </div>
  
<?php 

echo form_close();

?>
  </div>
