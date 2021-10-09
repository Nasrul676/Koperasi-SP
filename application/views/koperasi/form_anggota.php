

<div class="container">

  <div class="row mt-3">

    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          Form Tambah Anggota
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <?php echo form_open_multipart('Koperasi/tambah');?>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="fname" class="form-control" value="<?= set_value('fname');?>">
              <?= form_error('fname', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label>No.KTP</label>
              <input name="no_ktp" type="text" class="form-control" value="<?= set_value('no_ktp')?>">
              <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="kelamin">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat')?>">
              <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label>No.Telpon</label>
              <input type="text" name="no_telp" class="form-control" value="<?= set_value('no_telp')?>">
              <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="float-right"><button type="submit" class="btn btn-primary mt-3 col-md float right">Save</button></div>
          </form>
          <div class="row">
            <div class="col-md">

              <div class=""><a class="btn btn-danger mt-3" href="<?= base_url('koperasi/anggota')?>">Cancel</a></div>
            </div>
          </div>
        </blockquote>
      </div>
    </div>


  </div>

</div>

</div>