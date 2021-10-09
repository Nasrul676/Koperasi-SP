<nav class="navbar navbar-light bg-light sticky">
  <span class="navbar-brand mb-0 h1">Form Ganti Password</span>
</nav>


<div class="row">
  <div class="col-lg-6">
    <?= $this->session->flashdata('message');?>
</div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="mb-3 col-lg-12 mt-3">
            <div class="card" style="width: 18rem;">
              <div class="card-header">
                Ganti Password
            </div>
            <form method="post" action="<?= base_url();?>register/forgot" class="user col mt-3 mb-3">

                <div class="form-group">
                    <input type="password" name="curretpassword" class="form-control" aria-describedby="emailHelp" placeholder="Curret Password">
                    <?= form_error('curretpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>


                <div class="form-group">
                  <input type="password" name="newpassword1" class="form-control" aria-describedby="emailHelp" placeholder="New Password">
                  <?= form_error('newpassword1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                      <input type="password" name="newpassword2" class="form-control" aria-describedby="emailHelp" placeholder="Repeat Password">
                    <?= form_error('newpassword2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              <button type="submit" class="btn btn-primary">Change Password</button> 
              <a class="btn btn-danger ml-4" href="<?= base_url()?>koperasi/index">Cancel</a>
            </form>
      </div>
  </div>
</div>
</div>

