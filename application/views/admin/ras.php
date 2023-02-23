<div class="container-fluid">

<?php if($this->session->flashdata('message')!=null): ?>
<script>
    window.alert('<?= $this->session->flashdata('message') ?>')
</script>
<?php endif; ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
             <button type="button" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color:#ff9597; color:#ffffff" data-toggle="modal" data-target="#tambahRas"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Ras</button>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow">
                <div class="card-body">

                  <table class="table table-striped" id="data-table">
                    <thead>

                    <tr>
                     
                        <th>#</th>
                        <th>Nama Ras</th>
                        <th>Action</th>
                      
                    </tr>
                    </thead>
                      <tbody>
                    <?php foreach($ras as $index => $key): ?>
                
                    <tr>
                     
                        <td><?= $index + 1 ?></td>
                        <td><?= $key['nama'] ?></td>
                        <td>
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambahRas-<?= $key['id'] ?>">Ubah</button> 
                          <!-- | <button class="btn btn-danger btn-sm">Delete</button> -->
                        </td>
                      
                    </tr>

                    <!-- Modal Ubah Ras -->
                    <div class="modal fade" id="tambahRas-<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form action="<?= base_url('admin/ubahRas') ?>" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Ras</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="nama_ras">Nama Ras:</label>
                                <input type="text" name="namaUbah" id="nama_rasubah" class="form-control" value="<?= $key['nama'] ?>">
                                <input type="hidden" name="idUbah" id="id_rasubah" class="form-control" value="<?= $key['id'] ?>">
                                <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn" style="background-color:#ff9597; color:#ffffff">Simpan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- Akhir modal -->

                    <?php endforeach; ?>   
                    </tbody>  
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambahRas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="<?= base_url('admin/tambahRas') ?>" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Ras</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama_ras">Nama Ras:</label>
                    <input type="text" name="nama" id="nama_ras" class="form-control">
                    <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn" style="background-color:#ff9597; color:#ffffff">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function() {
          $('#data-table').DataTable();
      } );
        </script>