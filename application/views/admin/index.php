<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahUser ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kucing</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahKucing ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cat fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Ras</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlahRas ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-paw fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>

          <!-- Content Row -->

          <div class="row">

              <div class="col-lg-6">
                  <div class="card shadow">
                    <div class="card-header">
                      <h6 class="m-0 font-weight-bold text-primary">User Terbaru</h6>
                    </div>
                    <div class="card-body">
                      <div class="recent-post">
                        <table class="w-100">
                          <tbody>
                            <?php foreach($userTerbaru as $row): ?>
                            <tr>
                              <td>
                                <img src="<?= base_url('assets/images/default.jpg')?>">
                                <h1><?= $row['nama'] ?></h1>
                                  <p><i class="fas fa-fw fa-users"></i> &nbsp;<?= $row['kota'] ?></p>
                              </td>
                            </tr>       
                            <?php endforeach; ?>           
                          </tbody>
                        </table>
                      </div>  
                    </div>
                  </div>
              </div>

              <div class="col-lg-6">
                <div class="card shadow">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Kucing Terbaru</h6>
                  </div>
                  <div class="card-body">
                    <div class="recent-post">
                      <table class="w-100">
                        <tbody>
                            <?php foreach($kucingTerbaru as $row): ?>
                            <tr>
                              <td>
                              <img src="<?= base_url('').$row['foto'] ?>">
                                <h1><?= $row['nama'] ?></h1>
                                <p><i class="fas fa-fw fa-paw"></i> &nbsp;<?= $row['ras']['nama'] ?></p>
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

        </div>