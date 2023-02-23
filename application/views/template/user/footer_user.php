    <!-- // end .section -->
    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class=""><small>Copyright © 2020 | All right reserved</small></p>

    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="<?= base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Plugins JS -->
    <script src="<?= base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    
    <!-- MY SCRIPT -->
    <script src="<?= base_url('assets/js/script_user.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

    <!-- SELECT 2 -->
    <script src="<?= base_url('assets/vendor/select2/js/select2.js'); ?>"></script>
    <!-- AKHIR SELECT 2 -->

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKh7s8XWoZK4GtxgmYLkfSqrSCf4CQpno&libraries=places&callback=initMap">
    </script>

    <!-- Custom JS -->
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
    <script>
    $(document).ready(function(){
        if (window.location.href.indexOf("user/profil") > -1) {
            $('#menu-profile').addClass('active');
        }else if (window.location.href.indexOf("user/mycats") > -1) {
            $('#menu-mycats').addClass('active');
        }else{
            $('#menu-home').addClass('active');
        }
    });
    </script>


</body>

</html>


