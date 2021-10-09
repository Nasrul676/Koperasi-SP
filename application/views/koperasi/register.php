  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registration</h1>
              </div>
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message')?>"></div>
              <?php if($this->session->flashdata('message')) :?> 
               <!-- <div class="row mt-3 my-3 ml-3">
                 <div class="col-md-6">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pinjaman <strong>Berhasil</strong> <?= $this->session->flashdata('message');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div> -->
            <?php endif;?>
              <form class="user" method="post" action="<?= base_url('register/registration') ?>">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" Name="fname" id="fname" placeholder="Nama Lengkap" value="<?= set_value('fname')?>">
                    <?= form_error('fname', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" Name="kelamin" id="kelamin" placeholder="Jenis Kelamin" value="<?= set_value('kelamin')?>">
                    <?= form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" Name="email" id="email" placeholder="Email Address"value="<?= set_value('email')?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" Name="alamat" id="alamat" placeholder="Alamat Lengkap"value="<?= set_value('alamat')?>">
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" Name="password1" id="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" Name="password2" id="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('register') ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div> 