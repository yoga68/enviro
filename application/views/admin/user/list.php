<p>
  <a href="<?= base_url('admin/user/tambah');?>" title="Tambah User" class="btn btn-success">
    <i class="far fa-plus-square">&nbsp;Tambah User</i>
  </a>
</p>

<div class="card-body table-responsive p-0">
<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th width="5%">No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Username ( Level )</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
    <?php 
      $i=1;
      foreach ($user as $user) {
    ?>
  <tr>
    <td><?= $i; ?></td>
    <td><?= $user->nama; ?></td>
    <td><?= $user->email; ?></td>
    <td><?= $user->username; ?> - <?= $user->akses_level;?></td>
    <td>
      <a href="<?= base_url('admin/user/edit/'.$user->id_user);?>" title="Edit User" class="btn btn-warning btn-xs"><i class="far fa-edit"></i></a>
      <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?= $user->id_user;?>">
       <i class="fas fa-trash"></i>
      </a>
    </td>
  </tr>
  <div class="modal fade" id="del<?= $user->id_user;?>">
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
              <a href="<?= base_url('admin/user/delete/'.$user->id_user);?>" class="btn btn-outline-light">Ya, Hapus Data</a>
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
