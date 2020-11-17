<main id="main">

<section id="featured" class="featured">
        <div class="container">
            <img src="<?php echo base_url();?>uploads/img/<?php echo $baca->cover?>" class="img-fluid" alt="Responsive image">
            <span class="badge badge-info mt-3"><?php echo date('d/m/Y',strtotime($baca->tgl)); ?></span>
            <h3 class="mt-2"><strong><?php echo $baca->judul ?></strong></h3>
            <hr>
            <p class="text-justify mt-3"><?php echo $baca->redaksi?></p>
        </div>
    </section>

</main>