

<div class="container">

  <div class="row mt-3">

    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          Form Ubah Simpanan
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <form action="<?= base_url('koperasi/edit_sukarela')?>" method="post">
              <input type="hidden" name="id" value="<?= $simpanan_sukarela['id']; ?>">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_anggota" class="form-control" value="<?= $simpanan_sukarela['nama_anggota'];?>">
                <?= form_error('nama_anggota', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>No.KTP</label>
                <input name="no_ktp" type="text" class="form-control" readonly value="<?= $simpanan_sukarela['no_ktp'];?>">
                <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>No.KK</label>
                <input name="no_kk" type="text" class="form-control" readonly value="<?= $simpanan_sukarela['no_kk'];?>">
                <?= form_error('no_kk', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>No.Telpon</label>
                <input type="text" name="no_telp" class="form-control" value="<?= $simpanan_sukarela['no_telp'];?>">
                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>Tanggal</label>
                <input type="text" name="date_created" class="form-control" value="<?= $simpanan_sukarela['date_created'];?>">
                <?= form_error('date_created', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>Jumlah Simpanan Saat Ini</label>
                <input type="text" readonly name="simpanan_sukarela" class="form-control" value="<?= $simpanan_sukarela['simpanan_sukarela'];?>">
                <?= form_error('simpanan_sukarela', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

            

              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $simpanan_sukarela['alamat'];?>">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>


              <div class="float-right"><button type="submit" name="ubah" class="btn btn-primary mt-3 col-md float right">Save</button></div>
            </form>
            <div class="row">
              <div class="col-md">

                <div class=""><a class="btn btn-danger mt-3" href="<?= base_url('koperasi/sukarela')?>">Cancel</a></div>
              </div>
            </div>
          </blockquote>
        </div>
      </div>


    </div>

  </div>

</div>