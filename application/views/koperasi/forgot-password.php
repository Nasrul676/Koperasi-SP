  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2"><?= $title; ?></h1>
                  </div>



                  <form method="post" action="<?= base_url();?>register/forgot" class="user">
                   
                     <div class="form-group">
                      <input type="text" name="newpassword1" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="New Password">
                      <?= form_error('newpassword1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                     <div class="form-group">
                      <input type="text" name="newpassword2" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Repeat Password">
                      <?= form_error('newpassword2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Change Password</button> 
                  </form>




                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url()?>register/registration">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url()?>register/index">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>