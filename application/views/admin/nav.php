<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <?php
                    $hal = $this->uri->segment(1);
                ?>
                <ul class="nav navbar-nav">
                    <li class="<?=($hal=='PageAdmin')?'active':'';?>">
                        <a href="<?php echo site_url('PageAdmin'); ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Inventaris</li><!-- /.menu-title -->
                    <li class="<?=($hal=='PelangganAdmin')?'active':'';?>">
                        <a href="<?php echo site_url('PelangganAdmin'); ?>"> <i class="menu-icon fa fa-user"></i>Pelanggan</a>
                    </li>
                    <li class="<?=($hal=='Kategori')?'active':'';?>">
                        <a href="<?php echo site_url('KategoriAdmin'); ?>"> <i class="menu-icon fa fa-table"></i>Kategori</a>
                    </li>
                    <li class="<?=($hal=='Barang')?'active':'';?> menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Barang</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-puzzle-piece"></i><a href="<?php echo site_url('BarangAdmin/tambahbarangbaru'); ?>">Barang Baru</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="<?php echo site_url('BarangAdmin'); ?>">Stok Barang</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->