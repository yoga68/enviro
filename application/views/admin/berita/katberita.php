<p>
  <a href="" title="Tambah Kategori Berita" class="btn btn-success" data-toggle="modal" data-target="#tambah">
    <i class="far fa-plus-square">&nbsp;Tambah Kategori Berita</i>
  </a>
</p>

<div class="card-body table-responsive p-0">
<table id="example1" class="table table-bordered table-striped table-head-fixed">
  <thead>
  <tr>
    <th width="5%">No</th>
    <th>Nama Kategori</th>
    <th>Slug Kategori</th>
    <th>Urutan</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    <?php 
      $i=1;
      foreach ($katberita as $katberita) {
    ?>
  <tr>
    <td><?= $i; ?></td>
    <td><?= $katberita->nama_kategori; ?></td>
    <td><?= $katberita->slug_kategori; ?></td>
    <td><?= $katberita->urutan;?></td>
    <td>
      <a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $katberita->id_katberita; ?>" title="">
        <i class="far fa-edit"></i>
      </a>
      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?= $katberita->id_katberita;?>">
       <i class="fas fa-trash"></i>
      </a>
    </td>
  </tr>
  <div class="modal fade" id="edit<?= $katberita->id_katberita;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Update News Category</h3>
          </div>
          <?php 
            $attribut = 'class="form-horizontal"';


            //form open
            echo form_open(base_url('admin/berita/edit_katberita/'.$katberita->id_katberita), $attribut); 
          ?>
          <!-- Horizontal Form -->
        
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?= $katberita->nama_kategori;?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Urutan Kategori</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="urutan" placeholder="Urutan Kategori" value="<?= $katberita->urutan;?>" required>
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
      
  <div class="modal fade" id="del<?= $katberita->id_katberita;?>">
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
          <a href="<?= base_url('admin/berita/del_katberita/'.$katberita->id_katberita);?>" class="btn btn-outline-light">Ya, Hapus Data</a>
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
                <h3 class="card-title">Create News Category</h3>
              </div>
              <?php 
                $attribut = 'class="form-horizontal"';


                //form open
                echo form_open(base_url('admin/berita/katberita'), $attribut); 
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
            