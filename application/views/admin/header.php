
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url('PageAdmin'); ?>"><img src="<?php echo base_url().'images/logoo.png'?>" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="<?php echo site_url('PageAdmin'); ?>"><img src="<?php echo base_url().'images/welcome.png'?>" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url().'images/default.png'?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo site_url('PageAdmin/profil'); ?>"><i class="fa fa- user"></i>My Profile</a>

                            <a onclick="return confirm('Apakah akan logout?')" class="nav-link" href="<?php echo site_url('Login/logout'); ?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->