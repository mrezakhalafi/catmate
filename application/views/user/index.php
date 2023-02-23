<div class="section light-bg" id="features">

        <div class="container">
          <div class="row">
                <div class="col-lg-3">
                    <div class="card pricing popular">
                        <div class="card-category">Ras / Jenis Kucing</div>
                        <div id="rasTampung">
                            <?php foreach ($rasLimit as $row) : ?>
                                <div class="form-group m-0 isi-category">
                                    <label class="bungkus-check m-0"><span class="txt-dark "><?= $row['nama'] ?></span>
                                        <input type="checkbox" class="listnama" value="<?= $row['id'] ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> 
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group m-2 ml-4 ">
                              <select name="" id="cariRas" class="form-group select2">
                                  <option value="">Cari ras lain</option>
                                  <?php foreach ($ras as $row) : ?>
                                      <option value="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-id="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                  <?php endforeach; ?>
                                  
                              </select>
                        </div>                
                    
                        <div class="card-category">Jenis Kelamin</div>
                        <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">Jantan</span>
                              <input type="radio" name="jtn" value="Jantan" class="jkucing">
                              <span class="checkmark"></span>
                            </label>
                        </div> 
                        <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">Betina</span>
                              <input type="radio" name="jtn" value="Betina" class="jkucing">
                              <span class="checkmark"></span>
                            </label>
                        </div>  
                        <div class="card-category">Lokasi</div>
                       <!--  <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">DKI Jakarta</span>
                              <input type="checkbox" checked="checked">
                              <span class="checkmark"></span>
                            </label>
                        </div> -->
                        <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">Jakarta Barat</span>
                              <input type="radio" class="rbtempat" name="rbtempat" value="Jakarta Barat">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">Jakarta Selatan</span>
                              <input type="radio" class="rbtempat" name="rbtempat" value="Jakarta Selatan">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">Jakarta Pusat</span>
                              <input type="radio" class="rbtempat" name="rbtempat" value="Jakarta Pusat">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">Jakarta Timur</span>
                              <input type="radio" class="rbtempat" name="rbtempat" value="Jakarta Timur">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group m-0 isi-category">
                            <label class="bungkus-check m-0"><span class="txt-dark">Jakarta Utara</span>
                              <input type="radio" class="rbtempat" name="rbtempat" value="Jakarta Utara">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                       <div class="card-category">
                         <button type="button" id="btnCari" class="btn btn-catmate btn-lg btn-block">Cari Kucing</button>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9">
                <div class="row listkucing">

              <?php
              foreach($kucing as $row): ?>

                <div class="col-lg-4 mb-4">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="bungkus-card">
                                <img src="<?= base_url($row['foto']); ?>" class="w-100">
                                <div class="overlay">
                                    <div class="text">
                                        <?= $row['nama']; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('user/detailKucing/'.$row['id']);  ?>" class="btn btn-catmate btn-lg btn-block mt-4">Detail Kucing</a>
                        </div>
                    </div>
                </div>

                <?php
                endforeach;
                ?>

                </div>
              </div>
            </div> 
            

            </div>

            
              <div class="col-lg-12 text-center">
                    <!-- Pagination   -->
               <!--  <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" href="" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                      <li class="page-item active">
                        <a class="page-link" href="">1</a>
                      </li>
                      <li class="page-item">
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

    <!-- // end .section -->

    <!-- // end .section -->
