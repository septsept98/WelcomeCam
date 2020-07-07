<?php
	$this->load->view('admin/head');
?>

<body>
    <?php 
    	$this->load->view('admin/nav');
        $this->load->view('admin/header');
    ?>
        <!-- Content -->
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
                    </div><div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo site_url('PageAdmin'); ?>">Home</a></li>
                                    <li class="active">Profil</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit</strong> Profil
                            </div>
                            <?php foreach ($profil as $data):?>
                            <form action="<?php echo site_url('PageAdmin/up_profil'); ?>" method="post" enctype="multipart/form-data" class="form-Download">
                                <input type="hidden" name="id" value="<?php echo $data->id ?>">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="judul-input" class=" form-control-label">Nama </label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Nama" class="form-control" value="<?php echo $data->nama ?> "required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="judul-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $data->email ?>" required></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" style="margin-right: 82%;" onclick="location.href='<?php echo site_url('PageAdmin/profil'); ?>'"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</button>
                                    
                                    <button class="btn btn-success btn-sm" type="submit">Simpan <i class="fa fa-save"></i></button>
                                </div>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
<?php 
	$this->load->view('admin/footer');
?>