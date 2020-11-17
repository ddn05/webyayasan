<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 mb-4">Data Berita</h1>

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
    <a href="<?php echo base_url();?>admin/tambahberita" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-2"></i>Tambah Berita</a>
    <a href="<?php echo base_url();?>lap_ebook" class="btn btn-success btn-sm ml-2" target="_blank"><i class="fas fa-print mr-2"></i>Laporan Berita</a>
    </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Cover</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
            foreach($berita as $ber) {
        ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo date('d/m/Y',strtotime($ber->tgl)); ?></td>
                <td><?php echo $ber->judul?></td>
                <td>
                    <img src="<?php echo base_url('uploads/img/'.$ber->cover);?>" width="100px" height="100px">
                </td>
                <td>
                  <?php echo anchor ('admin/rincianberita/' .$ber->id, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                  <?php echo anchor('admin/editberita/'.$ber->id,'<div class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail Berita"><i class="fas fa-edit"></i></div>')?>
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="hapusdata(<?php echo $ber->id;?>);"><i class="fas fa-trash"></i></a>
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
          window.location = url+"admin/hapusberita/"+id;
        else
          return false;
        } 
</script>