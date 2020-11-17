<div class="container-fluid">
    <h3 class="mb-3">TAMBAH BERITA</h3>

    <div class="col-md-7 text-right">
        <?php
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "berhasil"){
                    echo "<div class='alert alert-success text-center'>Berhasil Menambahkan Berita</div>";
                }
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert alert-danger text-center'>Gagal Menambahkan Berita</div>";
                }
            }
        ?>
        <a class="btn btn-success btn-sm mb-2" href="<?php echo base_url('admin/berita');?>">Kembali</a>
    </div>

        <?php echo form_open_multipart('admin/inputberita')?>
        
        <div class="col-md-7">
            <div class="form-row">
                <?php
                    $date = date("Y-m-d");
                ?>
                <div class="form-group col-md-6">
                    <label for="tgl">Tanggal</label>
                    <input type="date" class="form-control" id="tgl" placeholder="" name="tgl" value="<?php echo $date?>" require>
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
                <input type="text" class="form-control" id="judul" placeholder="" name="judul" value="" require>
                <?php echo form_error('judul')?>
            </div>
            
            <div class="form-group">
                <label>Redaksi</label>
                <textarea name="redaksi" id="mytextarea" class="form-control" require></textarea>
                <!-- <input type="text" class="form-control" id="redaksi" placeholder="" name="redaksi" value="" require> -->
                <?php echo form_error('redaksi')?>
            </div>

            <button class="btn btn-primary btn-danger btn-sm mr-2" type="reset">Reset</button>
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        
        </div>
        <?php echo form_close(); ?>
        
</div>