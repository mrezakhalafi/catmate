<?php if($this->session->flashdata('message')!=null): ?>
<script>
    window.alert('<?= $this->session->flashdata('message') ?>')
</script>
<?php endif; ?>

    <!-- // end .section -->
    <div class="section">

        <div class="container">
            <div class="section-title">
                <h3 class="txt-pink">Kucing Saya</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <button type="button" data-user="<?= $this->session->userdata('id') ?>" class="btn btn-secondary-category-active btn-sm all kategoriAll">All <span class="badge badge-primary"><?= $count ?></span></button>

                    <?php foreach($ras as $row2) : ?>
                      <button type="button" data-user="<?= $this->session->userdata('id') ?>" data-id="<?= $row2['id'] ?>" class="btn btn-secondary-category btn-sm kategori"><?= $row2['nama'] ?>&nbsp; <span class="badge badge-primary-active"><?= $row2['total'] ?></span></button>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="row hehe">
                <div class="col-lg-3 mb-4">
                    <div class="card pricing popular">
                        <div class="card-body" style="height: 400px">
                            <a href="<?= base_url('user/tambahkucing'); ?>">
                            <div class="bungkus-card-tambah">
                                <img src="<?= base_url('assets/images/addcat.png'); ?>" class="w-100" style="margin-top: 30px">
                                <div class="overlay">
                                    <div class="text">
                                        Add Cat
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>


                <?php foreach ($kucing as $row ) : ?>
                <div class="col-lg-3 mb-4 list">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="bungkus-card">
                                <img src="<?= base_url(''.$row['foto']); ?>" class="w-100">
                                <div class="overlay">
                                    <div class="text">
                                        <?= $row['nama'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 pr-2">
                                    <a href="<?= base_url('user/detailKucing/').$row['id'] ?>" class="btn btn-catmate btn-lg btn-block mt-4">Detail</a>
                                </div>
                            <div class="row">
                                <div class="col-lg-6 pr-2">
                                    <a href="<?= base_url('user/ubahKucing/').$row['id'] ?>" class="btn btn-catmate-secondary btn-block mt-4">Ubah</a>
                                </div>
                                <div class="col-lg-6 pl-2">
                                    <a href="<?= base_url('user/hapusKucing/').$row['id'] ?>" class="btn btn-catmate-secondary btn-block mt-4">Hapus</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
               
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <!-- Pagination   -->
                <!-- <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" href="" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                      <li class="page-item">
                        <a class="page-link" href="">1</a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="">2</a>
                      </li>
                    <li class="page-item">
                      <a class="page-link" aria-label="Next" href="">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav> -->
            <!-- Akhir Pagination -->
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/lihatKucing.js') ?>"></script>


</script>