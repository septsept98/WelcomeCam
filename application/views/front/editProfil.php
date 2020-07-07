<?php  
    $this->load->view('front/header');
?>
<div class="inner">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4 mt-4"> <center>Edit Profil</center> </h4>
              <?php foreach ($profil as $data):?>
              <form action="<?php echo site_url('Page/up_profil'); ?>" method="post" enctype="multipart/form-data" class="form-Download">
                  <input type="hidden" name="id" value="<?php echo $data->id ?>">
                  <div class="card-body card-block">
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="judul-input" class=" form-control-label">Nama </label></div>
                          <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Nama" class="form-control" value="<?php echo $data->nama ?> "></div>
                      </div>
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="judul-input" class=" form-control-label">Username</label></div>
                          <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="username" class="form-control" value="<?php echo $data->username ?>" ></div>
                      </div>
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="judul-input" class=" form-control-label">Email</label></div>
                          <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $data->email ?>" ></div>
                      </div>
                  </div>
                  <div class="modal-footer">
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