            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CATEMAP <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logout sekarang ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Klik tombol logout</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn" style="background-color:#ff9597; color:#ffffff" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/vendor/sbadmin/jquery/jquery.min.js'); ?>"></script>
            <script src="<?= base_url('assets/vendor/sbadmin/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/vendor/sbadmin/jquery-easing/jquery.easing.min.js'); ?>"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/vendor/sbadmin/js/sb-admin-2.min.js'); ?>"></script>

            <!-- DataTable -->
            <script src="<?= base_url('assets/vendor/sbadmin/datatables/jquery.dataTables.min.js'); ?>"></script>
            <script src="<?= base_url('assets/vendor/sbadmin/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
            

            


            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/vendor/sbadmin/js/admin.js'); ?>"></script>
            <script>
            $(document).ready(function(){
    
                $('#dataTable').DataTable();

             <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

            <script type="text/javascript">
              $(document).ready(function() {
              $('#data-table').DataTable();
                 } );


                if (window.location.href.indexOf("ras") > -1) {
                    $('#menu-ras').addClass('active');
                    return ;
                }else if (window.location.href.indexOf("admin") > -1) {
                    $('#menu-dashboard').addClass('active');
                    return ;
                }
            });
            </script>
            </body>

            </html> 
