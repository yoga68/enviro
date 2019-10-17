<p>
  <a href="" title="Tambah Berita" class="btn btn-success" data-toggle="modal" data-target="#addnews">
    <i class="far fa-plus-square">&nbsp;Add News</i>
  </a>
</p>

<div class="card-body table-responsive p-0">
<table id="example1" class="table table-bordered table-striped table-head-fixed">
  <thead>
  <tr>
    <th width="5%">No</th>
    <th>Gambar</th>
    <th>Judul</th>
    <th>Jenis Berita</th>
    <th>Kategori Berita</th>
    <th>Status</th>
    <th>Penulis</th>
    <th>Tanggal</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    <?php 
      $i=1;
      foreach ($berita as $berita) {
    ?>
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="<?= base_url('assets/upload/image/news/'.$berita->gambar);?>" data-toggle="lightbox" data-title="<?= $berita->judul_berita; ?>">
      <img src="<?= base_url('assets/upload/image/thumbs/news/'.$berita->gambar);?>" width="60" class="img-fluid mb-2">
      </a>
    </td>
    <td><?= $berita->judul_berita; ?></td>
    <td><?= $berita->jenis_berita; ?></td>
    <td><?= $berita->nama_kategori;?></td>
    <td><?= $berita->status_berita; ?></td>
    <td><?= $berita->nama;?></td>
    <td><?= $berita->tanggal_post;?></td>
    <td>
      <a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editnews<?= $berita->id_berita;?>"><i class="far fa-edit"></i></a>
      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?= $berita->id_berita;?>">
       <i class="fas fa-trash"></i>
      </a>
    </td>
  </tr>      
  <div class="modal fade" id="del<?= $berita->id_berita;?>">
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
              <a href="<?= base_url('admin/berita/del_news/'.$berita->id_berita);?>" class="btn btn-outline-light">Ya, Hapus Data</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <div class="modal fade" id="editnews<?= $berita->id_berita;?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Update News</h3>
        </div>
        <?php 
          $attribut = 'class="form-horizontal"';

          if(isset($error_upload)){
            echo '<div class="alert alert-warning">'.$error_upload.'</div>';
          }
          //form open
          echo form_open_multipart(base_url('admin/berita/edit_news/'.$berita->id_berita), $attribut); 
        ?>
        <!-- Horizontal Form -->
      
        <!-- /.card-header -->
        <!-- form start -->
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 control-label">Judul Berita</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="judul_berita" placeholder="Judul Berita" value="<?= $berita->judul_berita;?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Status Berita</label>
              <div class="col-sm-4">
                <select name="status_berita" class="form-control">
                  <option value="Publish">Publish</option>
                  <option value="Draft" <?php if($berita->status_berita=="Draft"){echo "selected";} ?>>Draft</option>
                </select>
              </div>
              <label class="col-sm-2 control-label">Jenis Berita</label>
              <div class="col-sm-4">
                <select name="jenis_berita" class="form-control">
                  <option value="Berita">Berita</option>
                  <option value="Profil" <?php if($berita->jenis_berita=="Profil"){echo "selected";} ?>>Profil</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Kategori Berita</label>
              <div class="col-sm-4">
                <select name="id_katberita" class="form-control">
                  <?php foreach($katberita as $katberita1) {?>
                  <option value="<?= $katberita1->id_katberita; ?>" <?php if($berita->id_katberita==$katberita1->id_katberita) {echo "selected"; } ?>><?= $katberita1->nama_kategori;?></option>
                  <?php } ?>
                </select>
              </div>
              <label class="col-sm-2 control-label">Upload Gambar</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" name="gambar">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 control-label">Keywords</label>
               <div class="col-sm-10">
                 <input type="text" name="keywords" class="form-control" placeholder="Keywords Berita" value="<?= $berita->keywords;?>">
               </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 control-label">Isi Berita</label>
               <div class="col-sm-12">
                    <div class="card-body pad">
                      <div class="mb-3">
                        <textarea class="textarea" name="isi_berita"><?= $berita->judul_berita;?></textarea>
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
<div class="modal fade" id="addnews">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Create News</h3>
        </div>
        <?php 
          $attribut = 'class="form-horizontal"';

          if(isset($error_upload)){
            echo '<div class="alert alert-warning">'.$error_upload.'</div>';
          }
          //form open
          echo form_open_multipart(base_url('admin/berita/addnews'), $attribut); 
        ?>
        <!-- Horizontal Form -->
      
        <!-- /.card-header -->
        <!-- form start -->
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 control-label">Judul Berita</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="judul_berita" placeholder="Judul Berita" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Status Berita</label>
              <div class="col-sm-4">
                <select name="status_berita" class="form-control">
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                </select>
              </div>
              <label class="col-sm-2 control-label">Jenis Berita</label>
              <div class="col-sm-4">
                <select name="jenis_berita" class="form-control">
                  <option value="Berita">Berita</option>
                  <option value="Profil">Profil</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 control-label">Kategori Berita</label>
              <div class="col-sm-4">
                <select name="id_katberita" class="form-control">
                  <?php foreach($katberita as $katberita) {?>
                  <option value="<?= $katberita->id_katberita;?>"><?= $katberita->nama_kategori;?></option>
                  <?php } ?>
                </select>
              </div>
              <label class="col-sm-2 control-label">Upload Gambar</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" name="gambar" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 control-label">Keywords</label>
               <div class="col-sm-10">
                 <input type="text" name="keywords" class="form-control" placeholder="Keywords Berita">
               </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 control-label">Isi Berita</label>
               <div class="col-sm-12">
                    <div class="card-body pad">
                      <div class="mb-3">
                        <textarea class="textarea" name="isi_berita">Isi Berita</textarea>
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
  