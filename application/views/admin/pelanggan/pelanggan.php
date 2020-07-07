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
                                    <li class="active">Pelanggan</li>
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
                                <!-- <a href="<?php echo site_url('PelangganAdmin/tambahPelanggan') ?>"><span class="badge badge-success"><i class=" fa fa-plus"></i></span></a> -->
                                <strong class="card-title">Pelanggan</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="table_id" class="table table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        if(count($pelanggan)>0):
                                            $no=1; foreach ($pelanggan as $data): ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data->nama; ?></td>
                                            <td><?php echo $data->email; ?></td>
                                            <td><?php echo $data->username; ?></td>
                                            <td>*******</td>
                                            <td>
                                            <a onclick="return confirm('Apakah akan diedit?')"
                                             href="<?php echo site_url('PelangganAdmin/editPelanggan/'.$data->id) ?>"
                                             class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a onclick="return confirm('Apakah akan dihapus?')"
                                             href="<?php echo site_url('PelangganAdmin/hapusPelanggan/'.$data->id) ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>                                        
                                    <?php $no++; endforeach; ?>
                                    <?php else: ?>
                                        <td colspan="6" align="center"><strong>Data Kosong</strong></td>
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