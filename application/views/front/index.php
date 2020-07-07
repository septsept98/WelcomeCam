<?php  
    $this->load->view('front/header');
?>
<div class="inner">
    <div class="row">
      <h4 class="col-12 mb-4 mt-4"> <center>Informasi Barang</center> </h4>
        <?php foreach ($kategori as $kat): ?>
        <div class="col-3 mb-4"> 
          <div class="card">
            <div class="card-body">
              <a href="<?= site_url('Page/barang/'.$kat->id)?>" title="<?= $kat->kategori ?>">
                <img class="card-img-top" src="<?php echo base_url('assets/frontend/images/'.$kat->img_kat)?>" alt="">
              </a>
              <h4 class="card-title text-center">
                <a href="<?= site_url('Page/barang/'.$kat->id)?>" class="text-dark"><?= $kat->kategori ?></a>
              </h4>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
    $this->load->view('front/footer');
$this->load->view('front/master');
?>