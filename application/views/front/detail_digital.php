<?php  
    $this->load->view('front/header');
?>
<div class="inner">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4 mt-4"> <center>Detail Barang</center> </h4>
                <?php foreach ($barang as $data):?>
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
            <div class="mb-4">
                <a href="<?= site_url('Page/barang/'.$data->id_kategori);?>" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
            </div>    
        </div>
    </div>
</div>
<?php
    $this->load->view('front/footer');
$this->load->view('front/master');
?>