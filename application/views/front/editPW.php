<?php  
    $this->load->view('front/header');
?>
<div class="inner">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4 mt-4"> <center>Ganti Password</center> </h4>
              <?php foreach ($profil as $data):?>
              <form action="<?php echo site_url('Page/up_pw'); ?>" method="post" enctype="multipart/form-data" class="form-Download">
                  <input type="hidden" name="id" value="<?php echo $data->id ?>">
                  <div class="card-body card-block">
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="judul-input" class=" form-control-label">Password </label></div>
                          <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="password" class="form-control" required="required"></div>
                      </div>
                  </div>
                  <div class="modal-footer col-12">
                      <button type="button" class="btn btn-sm btn-warning" onclick="location.href='<?php echo site_url('Page/profil'); ?>'"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</button>
                      
                      <button class="btn btn-sm btn-primary" type="submit">Simpan <i class="fa fa-save"></i></button>
                  </div>
              </form>
              <?php endforeach; ?>   
        </div>
    </div>
</div>
<?php
    $this->load->view('front/footer');
$this->load->view('front/master');
?>