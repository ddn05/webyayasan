<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 mb-4"><strong>General Post</strong></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
    <h1 class="h4 text-gray-800 mb-3">Jumbotron</h1>

    <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "berhasil"){
                echo "<div class='alert alert-success'>Berhasil menambahkan Jumbotron.</div>";
            }
            if($_GET['pesan'] == "gagal"){
                echo "<div class='Berhasil menambahkan Jumbotron.</div>";
            }
            if($_GET['pesan'] == "hapusjumbotron"){
                echo "<div class='alert alert-success'>Berhasil menghapus Jumbotron.</div>";
            }
            if($_GET['pesan'] == "update"){
                echo "<div class='alert alert-success'>Berhasil mengupdate Jumbotron.</div>";
            }
        }
    ?>

    <a href="<?php echo base_url();?>admin/addjumbotron" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-2"></i>Tambah Jumbotron</a>
    <hr>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $no=1;
            foreach($jumbotron as $jum) {
        ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $jum->judul?></td>
                <td><?php echo $jum->deskripsi?></td>
                <td>
                    <img src="<?php echo base_url('uploads/img-jumbotron/'.$jum->gambar);?>" width="100px" height="100px">
                </td>
                <td>
                    <?php echo anchor('admin/editjumbotron/'.$jum->id,'<div class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail Berita"><i class="fas fa-edit"></i></div>')?>
                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="hapusdata(<?php echo $jum->id;?>);"><i class="fas fa-trash"></i></a>
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

<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function hapusdata(id){
       var r=confirm("Apakah anda yakin akan menghapus data ini ?")
        if (r==true)
          window.location = url+"admin/hapusjumbotron/"+id;
        else
          return false;
        } 
</script>