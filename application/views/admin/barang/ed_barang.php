<?php
	$this->load->view('admin/head');
?>

<body>
    <?php 
    	$this->load->view('admin/nav');
        $this->load->view('admin/header');
    ?>
        <div class="breadcrumbs">
            <?php if($this->session->flashdata('msg_berhasil')){ ?>
                <div class="alert alert-success alert-dismissible col-lg-12">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
                </div>
            <?php } ?>
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>CamStore</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo site_url('Dashboard'); ?>">Home</a></li>
                                    <li><a href="<?php echo site_url('Barang'); ?>">Barang</a></li>
                                    <li class="active">Edit Barang</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Edit</strong> Barang
                            </div>
                            <?php foreach ($barang as $brg) {?>
                                <form action="<?php echo site_url('BarangAdmin/up_gambar'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?= $brg->id ?>">
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-4">
                                               <img class="card-img-top" src="<?php echo base_url('images/barang/'.$brg->gambar)?>" alt="Card image cap">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="col-md-3"><label for="gambar-input" class=" form-control-label">Ganti Gambar</label></div>
                                                <div class="col-md-9"><input type="file" id="gambar" name="gambar" class="form-control-gambar" required></div>
                                                <div class="col-md-9 mt-2">
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="<?php echo site_url('BarangAdmin/up_barang'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?= $brg->id ?>">
                                    <input type="hidden" name="jumlah" value="<?= $brg->jumlah_barang ?>">
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="id_kategori" id="id_kategori" class="form-control">
                                                    <?php foreach ($kategori as $kat):?>
                                                        <option value="<?php echo $kat->id; ?>" <?php if($brg->id_kategori == $kat->id) echo "selected"; ?> ><?php echo $kat->kategori; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="nm-input" class=" form-control-label">Nama Barang</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="nm_barang" name="nm_barang" value="<?php echo $brg->nm_barang; ?>" class="form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="jml-input" class=" form-control-label">Jumlah</label></div>
                                            <div class="col-12 col-md-9"><input type="number" id="jml" name="jml" min="1" value="<?php echo $brg->jumlah_barang; ?>" class="form-control" disabled></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="harga-input" class=" form-control-label">Harga</label></div>
                                            <div class="col-12 col-md-9"><input type="number" id="harga_brg" name="harga_brg" value="<?php echo $brg->harga_barang; ?>" min="1000" class="form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="ket-input" class=" form-control-label">Keterangan Barang</label></div>
                                            <div class="col-12 col-md-9"><textarea class="ckeditor" name="ket_brg" id="ket_brg" rows="9" class="form-control"><?php echo $brg->ket_barang; ?></textarea></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col col-md-3">
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='<?php echo site_url('BarangAdmin'); ?>'"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</button>
                                        </div>
                                        <div class="col-12 col-md-9 text-right">
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="clearfix"></div>
<?php 
	$this->load->view('admin/footer');
?>