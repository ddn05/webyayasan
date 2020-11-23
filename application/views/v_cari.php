<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

        <ol>
            <li><a href="<?php echo base_url()?>user">Home</a></li>
            <li><a href="<?php echo base_url()?>user/berita">Berita</a></li>
            <li>Penelurusan</li>
        </ol>
            <div class="container p-0 m-0 text-right navbar mt-4">
                <h2>Hasil Penelusuran</h2>
                <?php echo form_open('user/search')?>
                    <form class="form-inline">
                    <div class="input-group">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Berita" aria-label="Search" name="keyword">
                        <div class="input-group-append">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                        </div>
                    </div>
                    </form>
                <?php echo form_close()?>
            </div>
            <p>Telusuri : <?php echo $kunci?></p>

            
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="featured" class="featured">

    
    <div class="container">

        <div class="row">

        <?php foreach($cari as $ber) { ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <!-- <img src="<?php echo base_url('uploads/img/'.$ber->cover);?>" alt="" class="card-img-top my-img-feature"> -->
                    <img src="<?php echo base_url().'uploads/img/'.$ber->cover;?>" class="card-img-top my-img-feature" alt="...">
                    <div class="card-body">
                    <h5><strong><?php echo $ber->judul?></strong></h5>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <?php echo anchor ('user/baca/' .$ber->id, '<button type="button" class="btn btn-sm btn-outline-secondary">Baca Berita</button>') ?>
                        </div>
                        <small class="text-muted"><?php echo date('d/m/Y',strtotime($ber->tgl)); ?></small>
                    </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>
    </div>
    </section>
</main>