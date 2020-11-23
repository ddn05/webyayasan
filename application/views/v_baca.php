<main id="main">

<section id="featured" class="featured">
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?php echo base_url()?>user">Home</a></li>
                <li><a href="<?php echo base_url()?>user/berita">Berita</a></li>
                <li>Baca</li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->

        <div class="container">
            <img src="<?php echo base_url();?>uploads/img/<?php echo $baca->cover?>" class="img-fluid" alt="Responsive image"><br>
            <span class="badge badge-info mt-3"><?php echo date('d/m/Y',strtotime($baca->tgl)); ?></span>
            <h3 class="mt-2"><strong><?php echo $baca->judul ?></strong></h3>
            <hr>
            <p class="text-justify mt-3"><?php echo $baca->redaksi?></p>
        </div>
    </section>

</main>