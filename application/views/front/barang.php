<?php  
    $this->load->view('front/header');
?>
<div class="inner">
    <div class="row">
    <?php foreach ($kat as $kategori): ?>
      <h4 class="col-12 mb-4 mt-4"> <center>Informasi <?php echo $kategori->kategori; ?> </center> </h4>
    <?php endforeach; ?>
        <?php foreach ($barang as $brg): ?>
        <div class="col-3 mb-4"> 
          <div class="card">
            <div class="card-body">
              <img class="card-img-top" src="<?php echo base_url('images/barang/'.$brg->gambar)?>" alt="">
              <h4 class="card-title text-center">
                <a href="<?= site_url('Page/detail/'.$brg->id)?>" class="text-dark"><?= $brg->nm_barang ?></a>
              </h4>
              <h6 class="card-subtitle mb-2 text-muted"><?= "Rp. ".number_format($brg->harga_barang,2,',','.'); ?></h6>
              <h6 class="card-subtitle mb-2 text-muted">Stok : <?= $brg->jumlah_barang ?></h6>
              <a href="<?= site_url('Page/detail/'.$brg->id)?>" class="btn btn-sm btn-primary">lihat detail</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <div class="col-12 mb-4">
            <a href="<?= site_url('Page');?>" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
        </div>
    </div>
</div>


<?php
    $this->load->view('front/footer');
$this->load->view('front/master');
?>