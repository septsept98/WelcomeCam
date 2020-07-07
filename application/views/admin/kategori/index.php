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
                                    <li class="active">Kategori</li>
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
                                <a href="<?php echo site_url('KategoriAdmin/tambahkat'); ?>"><span class="badge badge-success"><i class=" fa fa-plus"></i></span></a>
                                <strong class="card-title">Kategori</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="table_id" class="table table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        if(count($kategori)>0):
                                            $no=1; foreach ($kategori as $data):
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td><img class="card-img-top" src="<?php echo base_url('assets/frontend/images/'.$data->img_kat)?>" style="width: 50px;"></td>
                                            <td><?php echo $data->kategori; ?></td>
                                            <td>
                                            <a onclick="return confirm('Apakah akan diedit?')"
                                             href="<?php echo site_url('KategoriAdmin/editkat/'.$data->id) ?>"
                                             class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a onclick="return confirm('Apakah akan dihapus?')"
                                             href="<?php echo site_url('KategoriAdmin/hapuskat/'.$data->id) ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                            $no++; endforeach; ?>
                                    <?php else: ?>
                                        <td colspan="3" align="center"><strong>Data Kosong</strong></td>
                                    <?php endif; ?>
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