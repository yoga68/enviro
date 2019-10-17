<p>
  <a href="" title="Tambah Photos" class="btn btn-success" data-toggle="modal" data-target="#addgaleri">
    <i class="far fa-plus-square">&nbsp;Add Photos</i>
  </a>
</p>

<div class="card-body table-responsive p-0">
<table id="example1" class="table table-bordered table-striped table-head-fixed">
  <thead>
  <tr>
    <th width="5%">No</th>
    <th>Gambar</th>
    <th>Caption Photos</th>
    <th>Image Position</th>
    <th>Publisher</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    <?php 
      $i=1;
      foreach ($galeri as $galeri) {
    ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="<?= base_url('assets/upload/image/galeri/'.$galeri->gambar);?>" data-toggle="lightbox" data-title="<?= $galeri->caption; ?>">
      <img src="<?= base_url('assets/upload/image/thumbs/galeri/'.$galeri->gambar);?>" width="60" class="img-fluid mb-2">
      </a>
    </td>
    <td><?= $galeri->caption; ?></td>
    <td><?= $galeri->posisi; ?></td>
    <td><?= $galeri->nama;?></td>
    <td>
      <a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit_galeri<?= $galeri->id_galeri;?>"><i class="far fa-edit"></i></a>
      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?= $galeri->id_galeri;?>">
       <i class="fas fa-trash"></i>
      </a>
    </td>
  </tr>      
  <div class="modal fade" id="del<?= $galeri->id_layanan;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Photos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin ingin menghapus data ?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="<?= base_url('admin/gallery/del_galeri/'.$galeri->id_galeri);?>" class="btn btn-outline-light">Ya, Hapus Data</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <div class="modal fade" id="edit_galeri<?= $galeri->id_galeri;?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Changes Photo</h3>
        </div>
        <?php 
          $attribut = 'class="form-horizontal"';

          if(isset($error_upload)){
            echo '<div class="alert alert-warning">'.$error_upload.'</div>';
          }
          //form open
          echo form_open_multipart(base_url('admin/gallery/edit_galeri/'.$galeri->id_galeri), $attribut); 
        ?>
        <!-- Horizontal Form -->
      
        <!-- /.card-header -->
        <!-- form start -->
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 control-label">Caption Photos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="caption" placeholder="Caption Photos" value="<?= $galeri->caption;?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Category Photos</label>
              <div class="col-sm-4">
                <select name="id_katlayanan" class="form-control">
                  <?php foreach($katlayanan as $katlayanan1) {?>
                  <option value="<?= $katlayanan1->id_katlayanan; ?>" <?php if($galeri->id_katlayanan==$katlayanan1->id_katlayanan) {echo "selected"; } ?>><?= $katlayanan1->nama_kategori;?></option>
                  <?php } ?>
                </select>
              </div>
              <label class="col-sm-2 control-label">Image Position</label>
              <div class="col-sm-4">
                <select name="posisi" class="form-control">
                  <option value="Gallery">Gallery</option>
                  <option value="Homepage" <?php if($galeri->status_layanan=="Homepage"){echo "selected";} ?>>Homepage</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Upload Gambar</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="gambar">
              </div>
            </div>
              
          </div>
          <!-- /.card-body -->
          </div>
      <!-- /.card -->
          <div class="modal-footer justify-content-between">
            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> &nbsp;Reset</button>
            <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-envelope"></i>&nbsp;Publish</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
        <?php 
          echo form_close();
        ?>
  <?php 
    $i++; }
  ?>
  </tbody>
</table>
</div>
<div class="modal fade" id="addgaleri">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Add Photos</h3>
        </div>
        <?php 
          $attribut = 'class="form-horizontal"';

          if(isset($error_upload)){
            echo '<div class="alert alert-warning">'.$error_upload.'</div>';
          }
          //form open
          echo form_open_multipart(base_url('admin/galeri/addgaleri'), $attribut); 
        ?>
        <!-- Horizontal Form -->
      
        <!-- /.card-header -->
        <!-- form start -->
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 control-label">Caption Photos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="caption" placeholder="Caption Photos" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Category Photos</label>
              <div class="col-sm-4">
                <select name="id_katlayanan" class="form-control">
                  <?php foreach($katlayanan as $katlayanan) {?>
                  <option value="<?= $katlayanan->id_katlayanan;?>"><?= $katlayanan->nama_kategori;?></option>
                  <?php } ?>
                </select>
              </div>
              <label class="col-sm-2 control-label">Image Position</label>
              <div class="col-sm-4">
                <select name="posisi" class="form-control">
                  <option value="Gallery">Gallery</option>
                  <option value="Homepage">Homepage</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Upload Gambar</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="gambar" required>
              </div>
            </div>
              
          </div>
          <!-- /.card-body -->
          </div>
      <!-- /.card -->
          <div class="modal-footer justify-content-between">
            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> &nbsp;Reset</button>
            <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-envelope"></i>&nbsp;Publish</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
        <?php 
          echo form_close();
        ?>
  