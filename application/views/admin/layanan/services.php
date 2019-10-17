<p>
  <a href="" title="Tambah Berita" class="btn btn-success" data-toggle="modal" data-target="#addservices">
    <i class="far fa-plus-square">&nbsp;Add Services</i>
  </a>
</p>

<div class="card-body table-responsive p-0">
<table id="example1" class="table table-bordered table-striped table-head-fixed">
  <thead>
  <tr>
    <th width="5%">No</th>
    <th>Gambar</th>
    <th>Service Name</th>
    <th>Description</th>
    <th>Service Category</th>
    <th>Status</th>
    <th>Penulis</th>
    <th>Tanggal</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    <?php 
      $i=1;
      foreach ($layanan as $layanan) {
    ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="<?= base_url('assets/upload/image/services/'.$layanan->gambar);?>" data-toggle="lightbox" data-title="<?= $layanan->judul_layanan; ?>">
      <img src="<?= base_url('assets/upload/image/thumbs/services/'.$layanan->gambar);?>" width="60" class="img-fluid mb-2">
      </a>
    </td>
    <td><?= $layanan->judul_layanan; ?></td>
    <td><?= $layanan->isi_layanan;?></td>
    <td><?= $layanan->nama_kategori; ?></td>
    <td><?= $layanan->status_layanan; ?></td>
    <td><?= $layanan->nama;?></td>
    <td><?= $layanan->tanggal_post;?></td>
    <td>
      <a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editservices<?= $layanan->id_layanan;?>"><i class="far fa-edit"></i></a>
      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?= $layanan->id_layanan;?>">
       <i class="fas fa-trash"></i>
      </a>
    </td>
  </tr>      
  <div class="modal fade" id="del<?= $layanan->id_layanan;?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Menghapus Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin ingin menghapus data ?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="<?= base_url('admin/layanan/del_services/'.$layanan->id_layanan);?>" class="btn btn-outline-light">Ya, Hapus Data</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <div class="modal fade" id="editservices<?= $layanan->id_layanan;?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Update Services</h3>
        </div>
        <?php 
          $attribut = 'class="form-horizontal"';

          if(isset($error_upload)){
            echo '<div class="alert alert-warning">'.$error_upload.'</div>';
          }
          //form open
          echo form_open_multipart(base_url('admin/layanan/edit_services/'.$layanan->id_layanan), $attribut); 
        ?>
        <!-- Horizontal Form -->
      
        <!-- /.card-header -->
        <!-- form start -->
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 control-label">Judul Layanan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="judul_layanan" placeholder="Judul Layanan" value="<?= $layanan->judul_layanan;?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Status Layanan</label>
              <div class="col-sm-4">
                <select name="status_layanan" class="form-control">
                  <option value="Publish">Publish</option>
                  <option value="Draft" <?php if($layanan->status_layanan=="Draft"){echo "selected";} ?>>Draft</option>
                </select>
              </div>
              <label class="col-sm-2 control-label">Kategori Layanan</label>
              <div class="col-sm-4">
                <select name="id_katlayanan" class="form-control">
                  <?php foreach($katlayanan as $katlayanan1) {?>
                  <option value="<?= $katlayanan1->id_katlayanan; ?>" <?php if($layanan->id_katlayanan==$katlayanan1->id_katlayanan) {echo "selected"; } ?>><?= $katlayanan1->nama_kategori;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              
              <label class="col-sm-2 control-label">Keywords</label>
               <div class="col-sm-4">
                 <input type="text" name="keywords" class="form-control" placeholder="Keywords Layanan" value="<?= $layanan->keywords;?>">
               </div>
              <label class="col-sm-2 control-label">Upload Gambar</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" name="gambar">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 control-label">Isi Layanan</label>
               <div class="col-sm-12">
                    <div class="card-body pad">
                      <div class="mb-3">
                        <textarea class="textarea" name="isi_layanan"><?= $layanan->isi_layanan;?></textarea>
                      </div>
                    </div>
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
<div class="modal fade" id="addservices">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Create Services</h3>
        </div>
        <?php 
          $attribut = 'class="form-horizontal"';

          if(isset($error_upload)){
            echo '<div class="alert alert-warning">'.$error_upload.'</div>';
          }
          //form open
          echo form_open_multipart(base_url('admin/layanan/addservices'), $attribut); 
        ?>
        <!-- Horizontal Form -->
      
        <!-- /.card-header -->
        <!-- form start -->
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 control-label">Judul Layanan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="judul_layanan" placeholder="Judul Layanan" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Status Layanan</label>
              <div class="col-sm-4">
                <select name="status_layanan" class="form-control">
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                </select>
              </div>
              <label class="col-sm-2 control-label">Kategori Layanan</label>
              <div class="col-sm-4">
                <select name="id_katlayanan" class="form-control">
                  <?php foreach($katlayanan as $katlayanan) {?>
                  <option value="<?= $katlayanan->id_katlayanan;?>"><?= $katlayanan->nama_kategori;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Keywords</label>
               <div class="col-sm-4">
                 <input type="text" name="keywords" class="form-control" placeholder="Keywords Layanan">
               </div>
              <label class="col-sm-2 control-label">Upload Gambar</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" name="gambar" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 control-label">Isi Layanan</label>
               <div class="col-sm-12">
                    <div class="card-body pad">
                      <div class="mb-3">
                        <textarea class="textarea" name="isi_layanan">Isi Layanan</textarea>
                      </div>
                    </div>
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
  