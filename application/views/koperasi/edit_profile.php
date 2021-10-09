<nav class="navbar navbar-light bg-light">
	<a class="navbar-brand" href="#">Form Edit Profile</a>
	</nav>

	<?= $this->session->flashdata('message'); ?>
	<div class="row">
		<div class="col-lg-7 mt-5 ml-5">
			<?= form_open_multipart('Koperasi/editprofile');?>
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<label for="Email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="email" id="email" value="<?= $user['email'];?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="Fname" class="col-sm-2 col-form-label">Nama Lengkap</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="fname" id="fname" value="<?= $user['fname'];?>">
							 <?= form_error('fname', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">Picture</div>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-3">
									<img src="<?= base_url('asset/img/profile/'). $user ['image'];?>" class="img-thumbnail">
								</div>
								<div class="col-sm-9">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="image" name="image">
										<label class="custom-file-label" for="image">Choose file</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row justify-content-end">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a class="btn btn-warning" href="<?= base_url('koperasi')?>">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>