<p>
  <a href="" title="Tambah Kategori Layanan" class="btn btn-success" data-toggle="modal" data-target="#tambah">
    <i class="far fa-plus-square">&nbsp;Tambah Kategori Layanan</i>
  </a>
</p>

<div class="card-body table-responsive p-0">
<table id="example1" class="table table-bordered table-striped table-head-fixed">
  <thead>
  <tr>
    <th width="5%">No</th>
    <th>Nama Kategori</th>
    <th>Deskripsi</th>
    <th>Slug Kategori</th>
    <th>Urutan</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    <?php 
      $i=1;
      foreach ($katlayanan as $katlayanan) {
    ?>
  <tr>
    <td><?= $i; ?></td>
    <td><?= $katlayanan->nama_kategori; ?></td>
    <td><?= $katlayanan->isi_katlayanan;?></td>
    <td><?= $katlayanan->slug_kategori; ?></td>
    <td><?= $katlayanan->urutan;?></td>
    <td>
      <a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $katlayanan->id_katlayanan; ?>" title="">
        <i class="far fa-edit"></i>
      </a>
      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?= $katlayanan->id_katlayanan;?>">
       <i class="fas fa-trash"></i>
      </a>
    </td>
  </tr>
  <div class="modal fade" id="edit<?= $katlayanan->id_katlayanan;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Update Services Category</h3>
          </div>
          <?php 
            $attribut = 'class="form-horizontal"';


            //form open
            echo form_open(base_url('admin/layanan/edit_katlayanan/'.$katlayanan->id_katlayanan), $attribut); 
          ?>
          <!-- Horizontal Form -->
        
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?= $katlayanan->nama_kategori;?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Urutan Kategori</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="urutan" placeholder="Urutan Kategori" value="<?= $katlayanan->urutan;?>" required>
                </div>
              </div>
              <div class="form-group row">
              <label class="col-sm-12 control-label">Deskripsi</label>
               <div class="col-sm-12">
                    <div class="card-body pad">
                      <div class="mb-3">
                        <textarea class="textarea" name="isi_katlayanan"><?= $katlayanan->isi_katlayanan;?></textarea>
                      </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.card-body -->
            </div>
        <!-- /.card -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> &nbsp;Close</button>
              <input type="submit" class="btn btn-success" name="submit" value="Update Category">
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
      
  <div class="modal fade" id="del<?= $katlayanan->id_katlayanan;?>">
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
          <a href="<?= base_url('admin/layanan/del_katlayanan/'.$katlayanan->id_katlayanan);?>" class="btn btn-outline-light">Ya, Hapus Data</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  
  <?php 
    $i++; }
  ?>
  </tbody>
</table>
</div>

      <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Services Category</h3>
              </div>
              <?php 
                $attribut = 'class="form-horizontal"';


                //form open
                echo form_open(base_url('admin/layanan/katlayanan'), $attribut); 
              ?>
              <!-- Horizontal Form -->
            
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Urutan Kategori</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="urutan" placeholder="Urutan Kategori" required>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label class="col-sm-12 control-label">Deskripsi</label>
                    <div class="col-sm-12">
                        <div class="card-body pad">
                          <div class="mb-3">
                            <textarea class="textarea" name="isi_katlayanan">Deskripsi Layanan</textarea>
                          </div>
                        </div>
                    </div>
            </div>
                </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> &nbsp;Close</button>
                  <input type="submit" class="btn btn-success" name="submit" value="Add Category">
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
            