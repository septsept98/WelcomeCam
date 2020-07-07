<?php
	$this->load->view('admin/head');
?>

<body>
    <?php 
    	$this->load->view('admin/nav');
        $this->load->view('admin/header');
    ?>
        <div class="breadcrumbs">
                    <!-- <div class="alert alert-success alert-dismissible col-lg-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong><br>
                    </div> -->
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
                                    <li class="active">Detail Barang</li>
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
                                <strong class="card-title">Detail</strong> Barang
                            </div>
                            <div class="card-body card-block">
                                    <?php foreach ($barang as $data):
                                    ?>
                                    <div class="row form-group">
                                        <div class="col col-md-4">

                                           <img class="card-img-top" src="<?php echo base_url('images/barang/'.$data->gambar)?>" alt="Card image cap">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <h3><?php echo $data->nm_barang; ?></h3>
                                            <strong><?php echo $data->kategori; ?></strong>
                                            <address class="mt-3">
                                              <strong>Jumlah</strong><br>
                                              <?php echo $data->jumlah_barang; ?><br>
                                              <b>Harga</b><br>
                                               <?php echo "Rp. ".number_format($data->harga_barang,2,',','.'); ?><br>
                                              <strong>Keterangan</strong><br>
                                              <?php echo $data->ket_barang; ?>
                                            </address>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="col-md-12 mb-3">
                                        <h4><b>Detail Stok Masuk</b></h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(count($barang)>0): ?>
                                                <?php $no = 1; foreach ($barang_masuk as $masuk): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $masuk->tgl_masuk; ?></a>
                                                    </td>
                                                    <td>
                                                        <?php echo $masuk->jumlah; ?></a>
                                                    </td>
                                                </tr>
                                                <?php $no++; endforeach; ?>
                                                <?php else: ?>
                                                    <td colspan="6" align="center"><strong>Data Kosong</strong></td>
                                                <?php endif; ?>

                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                                    <div class="modal-footer">
                                        <div class="col">
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='<?php echo site_url('BarangAdmin'); ?>'"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</button>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="clearfix"></div>
<?php 
	$this->load->view('admin/footer');
?>