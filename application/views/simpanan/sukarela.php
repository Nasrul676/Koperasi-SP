<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url()?>koperasi">
      <div class="sidebar-brand-icon"><i class="fab fa-kickstarter-k"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Koperasi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>koperasi/index">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url()?>koperasi/pegawai">
          <i class="fas fa-user"></i>
          <span>Pegawai</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url()?>koperasi/anggota">
          <i class="fas fa-users"></i>
          <span>Anggota</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Simpanan</span>
        </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jenis Simpanan :</h6>
            <a class="collapse-item" href="<?= base_url('koperasi/pokok')?>">Pokok</a>
            <a class="collapse-item" href="<?= base_url('koperasi/wajib')?>">Wajib</a>
            <a class="collapse-item" href="<?= base_url('koperasi/sukarela')?>">Sukarela</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url()?>koperasi/pinjaman">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Pinjaman</span></a>
        </li>

        <!-- Nav Item - Tables -->
        


          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="sticky navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>

                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['fname']?></span>
                   <img class="img-profile rounded-circle" src="<?= base_url('asset/img/profile/') . $user['image']; ?>">
                 </a>
                 <!-- Dropdown - User Information -->
                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" data-toggle="modal" data-target="#profile" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="<?= base_url('register/forgot')?>">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-dark-400"></i>
                    Ganti Password
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>

        </ul>

      </nav>
      <!-- End of Topbar -->



      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Simpanan Sukarela</h1>

      </div>


      <div onclick="flashdata" class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
      <?php if($this->session->flashdata('message')) :?> 
      <!--<div class="row mt-3 my-3 ml-3">
         <div class="col-md-6">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Simpanan Sukarela <strong>Berhasil</strong> <?= $this->session->flashdata('message');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>-->
    <?php endif;?>
    



    <div class="row mx-3">
      <div class="col-md-6 mb-4">
        <a href="<?= base_url('koperasi/form_sukarela')?>" class="btn btn-primary">Tambah Simpanan</a>
      </div>
    </div>
    <!-- /.container-fluid -->
<table class="small table ml-2 mr-2 table-bordered" id="mytabel">
      <thead>
      <th>No</th>
            <th>Nama</th>
            <th>No KTP</th>
            <th>No KK</th>
            <th>No Telpon</th>
            <th>Simpanan Pokok</th>
            <th>Alamat</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Action</th>
      </thead>
      <tbody>
        <?php
          $no = 1;
          foreach ($data as $agg) {
        ?>
          <td><?= $no++  ?></td>
              <td><?= $agg->nama_anggota ?></td>
              <td><?= $agg->no_ktp ?></td>
              <td><?= $agg->no_kk ?></td>
              <td><?= $agg->no_telp ?></td>
              <td>Rp <?php echo number_format($agg->simpanan_sukarela,2,',','.')?></td>
              <td><?= $agg->alamat ?></td>
              <td><?= $agg->date_created ?></td>
              <td><?= $agg->status ?></td>
              <td>
                <a class="badge badge-danger" <?php echo anchor('koperasi/hapussukarela/'.$agg->id,'Hapus'); ?></a>
            <a class="badge badge-primary"<?php echo anchor('koperasi/edit_sukarela/'.$agg->id,'Edit'); ?></a>
            <a class="badge badge-success"<?php echo anchor('koperasi/form_penarikan/'.$agg->id,'Tarik'); ?></a>
              </td>
            </tr>

          <?php } ?>
      </tbody>
  </table>
</a>
</div>



            

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Klik Logout Jika Anda Ingin Keluar</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url()?>register/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>




<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog cascading-modal" role="document">

              <!--Content-->
              <div class="modal-content">

                <!--Header-->
                <div class="modal-header light-blue darken-3 white-text">

                  <!--Body-->
                  <div class="modal-body mt-0 text-center">


                    

                      <!-- Page Heading -->
                          <img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" alt="..." class="img-thumbnail">
                            <div class="card-body">
                              <h5 class="card-title"><?= $user['fname']; ?></h5>
                                <p class="card-text"><?= $user['email']; ?></p>
                                <p class="card-text"><small class="text-muted">Member since <?= date('d F Y  ', $user['date_created']); ?></small></p>
                           </div>
                        <a class="btn btn-warning" href="<?= base_url('Koperasi/editprofile')?>"><i class="fas fa-edit"></i>Edit Profile</a>  
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>Cancel</button>  
                    </div>
                  </div>
                </div>
              </div>
            </div>    