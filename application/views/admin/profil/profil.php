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
        </div>
        <div class="content">
            <div class="animated fadeIn">

                <div class="row">
				<!-- DataTables -->
				<div class="col lg-12">
				<div class="card mb-3">
					<div class="card-header">
						<!-- <a href="<?php echo site_url(); ?>/PageAdmin/inProfil"><i class="fa fa-plus"></i> Tambah Anggota</a> -->
						<strong>Profil</strong>
						<!-- <?php 
						$now = date('Y-m-d');
						echo $now 
						?> -->
					</div>
					
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
								</thead>
								<tbody>
									<?php foreach ($profil as $data): ?>
                                    <tr>
										<th>Nama</th>
										<td>
											<?php echo $data->nama; ?>
										</td>
									</tr>
									<tr>
										<th>Username</th>
										<td>
											<?php echo $data->username; ?>
										</td>
									</tr>
									<tr>
										<th>Password</th>
										<td>
											**************
										</td>
									</tr>
									<tr>
										<th>Email</th>
										<td>
											<?php echo $data->email; ?>
										</td>
									</tr>
									<tr>
										<td align="center" colspan="3">
											<a href="<?php echo site_url('PageAdmin/editProfil/'.$data->id); ?>"
											 class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit Profil</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
<?php 
	$this->load->view('admin/footer');
?>