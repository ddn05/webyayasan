<div class="container-fluid">
    <h3 class="mb-3">UBAH BERITA</h3>

    <div class="col-md-7 text-right">
        <a class="btn btn-success btn-sm mb-2" href="<?php echo base_url('admin/berita');?>">Kembali</a>
    </div>
        <?php foreach ($update as $upd) { ?>

        <?php echo form_open_multipart('admin/updateberita')?>
        
        <div class="col-md-7">
            <img class="mb-3" src="<?php echo base_url('uploads/img/'.$upd->cover);?>" style="height:100px; width:auto;" alt="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tgl">Tanggal</label>
                    <input type="hidden" class="form-control" id="id" placeholder="" name="id" value="<?php echo $upd->id?>" require>
                    <input type="date" class="form-control" id="tgl" placeholder="" name="tgl" value="<?php echo $upd->tgl?>" require>
                    <?php echo form_error('tgl')?>
                </div>
                <div class="form-group col-md-6">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control" id="cover" placeholder="" name="cover" value="" require>
                    <?php echo form_error('cover')?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" placeholder="" name="judul" value="<?php echo $upd->judul?>" require>
                <?php echo form_error('judul')?>
            </div>
            
            <div class="form-group">
                <label>Redaksi</label>
                <textarea name="redaksi" id="redaksi" class="form-control" require><?php echo $upd->redaksi?></textarea>
                <!-- <input type="text" class="form-control" id="redaksi" placeholder="" name="redaksi" value="" require> -->
                <?php echo form_error('redaksi')?>
            </div>

            <button class="btn btn-primary btn-danger btn-sm mr-2" type="reset">Reset</button>
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        
        </div>
        <?php echo form_close(); ?>

        <?php }?>
</div>