<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>CV. Welcome Camera</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/main.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css" />
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> -->
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<div class="container">
				<div class="row">
						<div class="col-6">
							<a href="<?= site_url('Page');?>"><img src="<?= base_url(); ?>assets/frontend/images/logo.png" width="100px"></img></a>
						</div>
						<?php if(is_null($this->session->userdata('masuk'))){  ?>

						<div class="col-6 link text-right">
							<a href="<?= base_url('Login'); ?>" title="logout"><i class="fa fa-power -off"></i>Login</a>
							<a href="<?= base_url('Register'); ?>" title="logout"><i class="fa fa-power -off"></i>Register</a>
						</div>
						<?php }else{ ?>
						<div class="col-6 link text-right">
							<a href="<?= base_url('Page/profil'); ?>" title="profil"><i class="fa fa-power -off"></i>Profil</a>
							<a onclick="return confirm('Apakah akan logout?')" href="<?= base_url('Login/logout'); ?>" title="logout"><i class="fa fa-power -off"></i>Logout</a>
						</div>
						<?php } ?>
				</div>
			</div>
			</header>


		<!-- Nav -->
			

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<img src="<?= base_url(); ?>assets/frontend/images/welcome.png" width="150px">
					<h1>CV. Welcome Camera</h1>
				</div>
				<video autoplay loop muted playsinline src="<?= base_url(); ?>assets/frontend/images/banner.jpg"></video>
			</section>
			<!-- <br>

			<center><div>
        <a href="<?= base_url('Page'); ?>" class="btn btn-success btn-lg">Data barang</a>
        <a href="<?= base_url('stok'); ?>" class="btn btn-danger btn-lg">Data stok</a>
    </div></center>
    <br> -->