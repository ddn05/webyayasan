<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 mb-4"><strong>Data Petugas</strong></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  
  <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "berhasil"){
                echo "<div class='alert alert-success'>Berhasil menambahkan berita.</div>";
            }
            if($_GET['pesan'] == "gagal"){
                echo "<div class='Berhasil menambahkan berita.</div>";
            }
            if($_GET['pesan'] == "hapusberita"){
              echo "<div class='alert alert-success'>Berhasil menghapus berita.</div>";
            }
            if($_GET['pesan'] == "update"){
              echo "<div class='alert alert-success'>Berhasil mengupdate berita.</div>";
            }
        }
    ?>

  <!-- Button trigger modal -->
    <button class="btn btn-sm btn-primary" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      <i class="fas fa-plus mr-2"></i>Tambah Admin
    </button>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>NO.</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
            foreach($admin as $adm) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $adm->nama ?></td>
                <td><?php echo $adm->username ?></td>
                <td><input type="password" class="form-control" id="password" placeholder=""  value="<?php echo $adm->password?>" name="password" readonly></td>
                <td>
                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="hapusdata(<?php echo $adm->id;?>);"><i class="fas fa-trash mr-2"></i>Hapus</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php echo form_open_multipart('admin/inputadmin');?>
      <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="" name="nama" require>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="" name="username" require>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="" name="password" require>
        </div>
      <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function hapusdata(id){
       var r=confirm("Apakah anda yakin akan menghapus data ini ?")
        if (r==true)
          window.location = url+"admin/hapusadmin/"+id;
        else
          return false;
        } 
</script>