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
                                    <li class="active">Barang</li>
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
                                <a href="<?php echo site_url('BarangAdmin/tambahstokbarang') ?>"><span class="badge badge-success"><i class=" fa fa-plus"></i></span></a>
                                <strong class="card-title">Tambah Stok Barang</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="table_id" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Nama Barang</th>
                                                <th>Gambar</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Ket Barang</th>
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($barang)>0): ?>
                                            <?php $no = 1; foreach ($barang as $data): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->kategori; ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $data->nm_barang; ?></a>
                                                </td>
                                                <td><img class="card-img-top" src="<?php echo base_url('images/barang/'.$data->gambar)?>" style="width: 50px;"></td>
                                                <td>
                                                    <?php echo $data->jumlah_barang; ?>
                                                </td>
                                                <td>
                                                    <?php echo "Rp. ".number_format($data->harga_barang,2,',','.'); ?>
                                                </td>
                                                <td>
                                                    <?php if(strlen($data->ket_barang) > 50){
                                                        echo substr($data->ket_barang, 0, 50)."....";
                                                    }else{
                                                        echo $data->ket_barang;
                                                    }
                                                    ?>
                                                </td>
                                                <td >
                                                    <a href="<?= site_url('BarangAdmin/detailbarang/'.$data->id)?>"
                                                     class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a onclick="return confirm('Apakah <?php echo $data->nm_barang; ?> akan diedit?')"
                                                     href="<?php echo site_url('BarangAdmin/editbarang/'.$data->id); ?>"
                                                     class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Apakah <?php echo $data->nm_barang; ?> akan dihapus?')"
                                                     href="<?php echo site_url('BarangAdmin/hapusbarang/'.$data->id); ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="clearfix"></div>
<?php 
	$this->load->view('admin/footer');
?>