<?php if($this->session->flashdata('message')!=null): ?>
<script>
    window.alert('<?= $this->session->flashdata('message') ?>')
</script>
<?php endif; ?>    
    
    <!-- // end .section -->
    <div class="section">

        <div class="container">
            <div class="section-title">
                <h3 class="txt-pink">Profile</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-6" style="display: flex;">
                                    <img src="<?= base_url('assets/images/cat2.svg'); ?>" class="w-100">
                                </div>
                                
                                <div class="col-lg-6">
                                    <form action="<?= base_url('user/ubahProfil') ?>" method="post">
                                        <fieldset>
                                            <legend class="txt-pink">Edit Profile</legend>
                                            <div class="form-group">
                                                <label class="txt-dark">Nama:</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $profil['nama'] ?>">
                                                <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="txt-dark">Alamat:</label>
                                                <input type="text" name="alamat" class="form-control" value="<?= $profil['alamat'] ?>">
                                                <?= form_error('alamat','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="txt-dark">Kota:</label>
                                                <select name="kota" id="kota" class="form-control">
                                                    <option value="" class="input100">Pilih Kota</option>
                                                    <option value="Jakarta Pusat" class="form-control">Jakarta Pusat</option>
                                                    <option value="Jakarta Timur" class="form-control">Jakarta Timur</option>
                                                    <option value="Jakarta Utara" class="form-control">Jakarta Utara</option>
                                                    <option value="Jakarta Selatan" class="form-control">Jakarta Selatan</option>
                                                    <option value="Jakarta Barat" class="form-control">Jakarta Barat</option>
                                                </select>
                                                <?= form_error('kota','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="txt-dark">Telepon:</label>
                                                <input type="text" name="telepon" class="form-control" value="<?= $profil['telepon'] ?>">
                                                <?= form_error('telepon','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                        </fieldset>   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


               
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="<?= base_url('user/ubahPassword') ?>" method="post">
                                        <fieldset>
                                            <legend class="txt-pink">Privacy</legend>
                                            <div class="form-group">
                                                <label class="txt-dark">Password lama:</label>
                                                <input type="password" name="passwordlama" class="form-control">
                                                <?= form_error('passwordlama','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="txt-dark">Password Baru:</label>
                                                <input type="password" name="passwordbaru" class="form-control">
                                                <?= form_error('passwordbaru','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="txt-dark">Konfirmasi Password Baru:</label>
                                                <input type="password" name="passwordkonfirmasi" class="form-control">
                                                <?= form_error('passwordkonfirmasi','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                        </fieldset>
                                    </form>
                                </div>
                                
                                <div class="col-lg-6" style="display: flex;">
                                    <img src="<?= base_url('assets/images/password.svg'); ?>" class="w-100">
                                </div>
                                
                            </div>

                            
                        </div>
                    </div>
                </div>


               
            </div>
        </div>

    </div>
    <!-- // end .section -->

<script>

    $("#kota").val("<?= $profil['kota'] ?>");

</script>
