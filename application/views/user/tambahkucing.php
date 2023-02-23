<?php if($this->session->flashdata('message')!=null): ?>
<script>
    window.alert('<?= $this->session->flashdata('message') ?>')
</script>
<?php endif; ?>
    <!-- // end .section -->
    <div class="section">

        <div class="container">
            <div class="section-title">
                <h3 class="txt-pink">Tambah Kucing</h3>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <form action="<?= base_url('user/tambahKucingProses'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-lg-5" style="display: flex;">
                                        <img src="<?= base_url('assets/images/cat1.svg'); ?>" class="w-100">
                                    </div>
                                    <div class="col-lg-7" style="display: flex; flex-direction: column;">
                                        <div class="w-100 h-100">
                                            <div class="form-group">
                                                    <label for="nama_kucings">Nama Kucing:</label>
                                                    <input type="text" id="nama_kucing" class="form-control" name="nama" value="<?= set_value('nama'); ?>">
                                                    <input type="hidden" id="nama_kucing" class="form-control" name="user_id" value="<?= $this->session->userdata('id') ?>">
                                                    <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="nama_kucings">Jenis / Ras Kucing:</label>
                                                    <select class="form-control select2 w-100" name="ras_id">
                                                        <option value="">Pilih Ras</option>
                                                        <?php foreach($ras as $row): ?>
                                                            <option value="<?= $row['id'] ?>" ><?= $row['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('ras_id','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            
                                          <div class="form-group">
                                            <label>Jenis Kelamin:</label>

                                            <label class="bungkus-radio"><span class="txt-dark">Jantan</span>
                                              <input type="radio" value="Jantan" checked="checked" name="jk">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="bungkus-radio"><span class="txt-dark">Betina</span>
                                              <input type="radio" value="Betina" checked="checked" name="jk">
                                              <span class="checkmark"></span>
                                            </label>
                                            <?= form_error('jk','<small class="text-danger">','</small>'); ?>

                                           </div>


                                            <div class="form-group">
                                                    <label for="nama_kucings">Tanggal Lahir:</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir'); ?>">
                                                    <?= form_error('tanggal_lahir','<small class="text-danger">','</small>'); ?>
                                            </div>


                                            <div class="form-group">
                                                    <label for="nama_kucings">Bio:</label>
                                                    <textarea class="form-control" rows="3" name="biodata"><?= set_value('biodata'); ?></textarea>
                                                    <?= form_error('biodata','<small class="text-danger">','</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                    <label for="nama_kucings">Social Media:</label>
                                                    <input type="text" class="form-control" name="sosial_media" placeholder="(cth: https://insagram.com/catcute)" value="<?= set_value('sosial_media'); ?>">
                                                    <?= form_error('sosial_media','<small class="text-danger">','</small>'); ?>
                                            </div>


                                            <div class="form-group">
                                                <label>Foto Kucing:</label>
                                                <div class="file-field">
                                                    <div class="btn btn-catmate float-left" onclick="chooseFile();" style="cursor: pointer"><span>Choose file</span></div>
                                                        
                                                    <input type="file" id="fileInput" name="foto" style="display: none;" class="btn-upload-profile"/>
                                                    
                                                    <div class="file-path-wrapper">
                                                        <span class="">&nbsp; No file uploaded</span>
                                                    </div>
                                                    
                                                </div>
                                               
                                            </div>
                                             <?= form_error('foto','<small class="text-danger">','</small>'); ?>
                                        </div>

                                        <div class="w-100">
                                            <button type="submit" class="btn btn-primary btn-block mt-4" style="align-self: flex-end;">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->
<script>
   function chooseFile() {
      $("#fileInput").click();
   }
</script>


   
