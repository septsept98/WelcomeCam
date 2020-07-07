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
                                    <li><a href="<?php echo site_url('PageAdmin'); ?>">Home</a></li>
                                    <li><a href="<?php echo site_url('KategoriAdmin'); ?>">Kategori</a></li>
                                    <li class="active">Edit Kategori</li>
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
                                <strong class="card-title">Edit</strong> Kategori
                            </div>
                            <?php foreach ($kategori as $data):
                            ?>
                            <form action="<?php echo site_url('KategoriAdmin/up_gambar'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                           <img class="card-img-top" src="<?php echo base_url('assets/frontend/images/'.$data->img_kat)?>" alt="Card image cap">
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
                            <form action="<?php echo site_url('KategoriAdmin/up_kategori'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">       
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $data->id ?>">
                                        <div class="col col-md-3"><label for="kategori" class=" form-control-label">Nama Kategori</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kategori" name="kategori" class="form-control" value="<?php echo $data->kategori ?>"></div>
                                    </div> 
                                </div> 
                                <div class="modal-footer">
                                    <div class="col col-md-3">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='<?php echo site_url('KategoriAdmin'); ?>'"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</button>
                                    </div>
                                    <div class="col-12 col-md-9 text-right">
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="clearfix"></div>
<?php 
	$this->load->view('admin/footer');
?>