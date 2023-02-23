<script>
      function initMap() {
        var myLatlng = {lat: <?= $kucing['user']['latitude'] ?>, lng: <?= $kucing['user']['longitude'] ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: myLatlng
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Lihat alamat'
        });

        map.addListener('center_changed', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        marker.addListener('click', function() {
            $('#modalPosisi').modal('show');
            // map.setZoom(8);
            // map.setCenter(marker.getPosition());
        });
      }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modalPosisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alamat Lengkap</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>
                <?= $kucing['user']['alamat'] ?> 
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>



    <!-- // end .section -->
    <div class="section">
        <input type="hidden" id="lat" value="">
        <div class="container">
            <div class="section-title">
                <h3 class="txt-pink">Detail Kucing</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="bungkus-img-detail">
                                    <img src="<?= base_url(''.$kucing['foto']); ?>" class="img-detail-kucing">
                                    </div>
                                </div>
                                <div class="col-lg-7" style="display: flex; flex-direction: column;">
                                    <div class="w-100 h-100">
                                        <table class="tb-kucing">
                                            <tr>
                                                <td>Nama Kucing</td>
                                                <td>:</td>
                                                <td><?= $kucing['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kucing</td>
                                                <td>:</td>
                                                <td><?= $kucing['ras']['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?= $kucing['jk'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Usia</td>
                                                <td>:</td>
                                                <?php 
                                                    // $tahun = date_diff(date_create($kucing['tanggal_lahir']), date_create('today'))->y;
                                                    $birthday = new DateTime($kucing['tanggal_lahir']);
                                                    $diff = $birthday->diff(new DateTime());
                                                    $totalmonths = $diff->format('%m') + 12 * $diff->format('%y');
                                                    // $bulan = 9;
                                                    // $tahun = $totalmonths / 12;
                                                    // echo $tahun;

                                                ?>
                                                <td> <?= $totalmonths ?> bulan</td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td>:</td>
                                                <td><?= $kucing['user']['kota'] ?></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td><?= $kucing['biodata'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sosial Media</td>
                                                <td>:</td>
                                                <td><a href="<?= $kucing['sosial_media'] ?>">Instagram</a></td>
                                            </tr>
                                            <tr>
                                                <td>Pemilik</td>
                                                <td>:</td>
                                                <td><?= $kucing['user']['nama'] ?></td>
                                            </tr>
                                        </table>
                                    
                        
                                    
                                    </div>
                                    <?php
                                        $nomor = $kucing['user']['telepon'];
                                        $split = str_split($nomor);
                                        if ($split[0] == "0") {
                                            $split[0] = "62";
                                        }
                                        $gabung = implode($split);
                                        
                                    ?>
                                    <div class="w-100">
                                        <a href="https://api.whatsapp.com/send?phone=<?= $gabung ?>" class="btn btn-catmate-secondary btn-block mt-4" style="align-self: flex-end;">
                                            <i class="fab fa-whatsapp"></i> &nbsp;Hubungi Pemilik
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <p>Lokasi Kucing :</p>
                                    <div id="map" data-lat="<?= $kucing['user']['latitude'] ?>" data-lng="<?= $kucing['user']['longitude'] ?>" style="width: 100%; height: 450px;">
                                    
                                    </div>
                                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.379500492765!2d106.87684175000001!3d-6.18493695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4fa9bb853ff%3A0x66639f72c903e762!2sPT%20ASDP%20Indonesia%20Ferry%20(Persero)!5e0!3m2!1sen!2sid!4v1588563908623!5m2!1sen!2sid" class="w-100" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="recent-post shadow">
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <th class="bar-kucinglain txt-pink">Kucing Lainnya</th>
                                </tr>
                                
                                <?php foreach($kucinglainnya as $row): ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('user/detailKucing/'.$row['id']);  ?>">
                                            <img src="<?= base_url(''.$row['foto']); ?>">

                                            <h1><?= $row['nama'] ?></h1>
                                            <p>
                                                <?= $row['biodata'] ?>
                                            </p>
                                        
                                        
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>                
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->


   
