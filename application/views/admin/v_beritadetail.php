<div class="container-fluid">
    <h3 class="mb-3"><strong>RINCIAN BERITA</strong></h3>

    <div class="col-md-7 text-right">
        <a class="btn btn-success btn-sm mb-4" href="<?php echo base_url('admin/berita');?>">Kembali</a>
    </div>

    <div class="col-md-7">
        <img src="<?php echo base_url();?>uploads/img/<?php echo $detail->cover?>" class="img-fluid" alt="Responsive image">
        <span class="badge badge-info"><?php echo $detail->tgl?></span>
        <h3 class="mt-2"><strong><?php echo $detail->judul?></strong></h3>
        <hr>
        <p class="text-justify mt-3"><?php echo $detail->redaksi?></p>
    </div>

        
</div>