    <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-lg-5">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
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


                    <form class="user" method="post" action="<?= base_url('register'); ?>">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email')?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                      </button>
                    </form>
                    <hr>
                
                    <div class="text-center">
                      <a class="small" href="<?= base_url('register/registration'); ?>">Create an Account!</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div> 