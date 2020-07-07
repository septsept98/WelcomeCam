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
                                    <li><a href="<?php echo site_url('BarangAdmin'); ?>">Barang</a></li>
                                    <li class="active">Barang Baru</li>
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
                                <strong class="card-title">Tambah</strong> Barang Baru
                            </div>
                            <form action="<?php echo site_url('BarangAdmin/in_barangbaru'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="0">Pilih Kategori</option>
                                                <?php foreach ($kategori as $kat){
                                                ?>
                                                    <option value="<?php echo $kat->id; ?>"><?php echo $kat->kategori; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nm-input" class=" form-control-label">Nama Barang</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nm_brg" name="nm_brg" placeholder="Kamera" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="jml-input" class=" form-control-label">Jumlah Barang</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="jumlah_brg" name="jumlah_brg" min="1" placeholder="0" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="harga-input" class=" form-control-label">Harga Barang</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="harga_brg" name="harga_brg" placeholder="000" min="1000" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="gambar-input" class=" form-control-label">Gambar</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="gambar" name="gambar" class="form-control-gambar"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="ket-input" class=" form-control-label">Keterangan Barang</label></div>
                                        <div class="col-12 col-md-9"><textarea class="ckeditor" name="ket_brg" id="ket_brg" rows="9" placeholder="Keterangan..." class="form-control"></textarea></div>
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
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="clearfix"></div>
<?php 
	$this->load->view('admin/footer');
?>