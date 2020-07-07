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
                                    <li class="active">Stok Barang</li>
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
                                <strong class="card-title">Tambah</strong> Stok Barang
                            </div>
                            <form action="<?php echo site_url('BarangAdmin/in_stokbarang'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Barang</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="barang" id="barang" class="form-control">
                                                <option value="0">Pilih barang</option>
                                                <?php foreach ($barang as $data){
                                                ?>
                                                    <option value="<?php echo $data->id; ?>"><?php echo $data->nm_barang; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="jml-input" class=" form-control-label">Jumlah Barang</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="jumlah_brg" name="jumlah_brg" min="1" placeholder="0" class="form-control"></div>
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
                                        <button type="submit" onclick="return confirm('Yakin akan menambah stok barang?')" class="btn btn-success btn-sm">
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