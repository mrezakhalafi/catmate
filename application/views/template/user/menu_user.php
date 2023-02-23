    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="<?= base_url('user'); ?>"><img src="<?= base_url('assets/images/logo2.png'); ?>" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" id="menu-home" href="<?= base_url('user'); ?>">HOME <span class="sr-only">(current)</span></a> </li>
                                
                                
                                <?php if($this->session->userdata('role')=="user"): ?>
                                    <li class="nav-item"> <a class="nav-link" id="menu-profile" href="<?= base_url('user/profile'); ?>">PROFILE</a> </li>
                                    <li class="nav-item"> <a class="nav-link" id="menu-mycats" href="<?= base_url('user/mycats'); ?>">MY CATS</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('auth/logout'); ?>">LOGOUT</a> </li>
                                <?php elseif($this->session->userdata('role')=="admin"): ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin'); ?>">ADMIN</a> </li>
                                <?php else: ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('auth'); ?>">MASUK</a> </li>
                                    <li class="nav-item"><a href="<?= base_url('auth/register'); ?>" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Daftar</a></li>
                                <?php endif; ?>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

  