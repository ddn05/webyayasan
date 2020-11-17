<div class="container-fluid">
    <h3 class="mb-5"><strong>EDIT JUMBOTRON</strong></h3>
        <?php foreach ($edit as $ej) { ?>
        <?php echo form_open_multipart('admin/updatejumbotron')?>

        <img class="mb-4" src="<?php echo base_url('uploads/img-jumbotron/'.$ej->gambar);?>" style="height:100px; width:auto;" alt="">
            <div class="form-group">
                <label for="judul">Judul Jumbotron</label>
                <input type="hidden" class="form-control" id="id" placeholder="" name="id" value="<?php echo $ej->id?>" require>
                <input type="text" class="form-control" id="judul" placeholder="" name="judul" value="<?php echo $ej->judul?>" require>
                <?php echo form_error('judul')?>
            </div>
            
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" style="height:150px;" require><?php echo $ej->deskripsi?></textarea>
                <!-- <input type="text" class="form-control" id="redaksi" placeholder="" name="redaksi" value="" require> -->
                <?php echo form_error('deskripsi')?>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" class="form-control" id="gambar" placeholder="" name="gambar" value="" style="width:250px;" require>
                <?php echo form_error('gambar')?>
            </div>

            <button class="btn btn-primary btn-danger btn-sm mr-2" type="reset">Reset</button>
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        
        </div>
        <?php echo form_close(); ?>
        <?php } ?>
        
</div>