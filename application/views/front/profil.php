<?php  
    $this->load->view('front/header');
?>
<div class="inner">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4 mt-4"> <center>Profil</center> </h4>
                <?php foreach ($profil as $data):?>
                    <div class="row form-group">
                        <div class="col-12 col-md-8">
                            <address class="mt-3">
                              <strong>Nama</strong><br>
                              <?php echo $data->nama; ?><br>
                              <strong>Username</strong><br>
                              <?php echo $data->username; ?><br>
                              <strong>Email</strong><br>
                              <?php echo $data->email; ?><br>
                              <strong>Password</strong><br>
                              *****
                            </address>
                        </div>
                    </div>
                <?php endforeach; ?> 
            <div class="mb-4">
                <a href="<?= site_url('Page/editProfil/'.$data->id);?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>&nbsp;Edit data</a>
                <a href="<?= site_url('Page/editpw/'.$data->id);?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;Ganti password</a>
            </div>    
        </div>
    </div>
</div>
<?php
    $this->load->view('front/footer');
$this->load->view('front/master');
?>