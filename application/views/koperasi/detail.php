<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?= base_url('asset/img/profile/'). $anggota['image'];?>" alt="Card image cap">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><?= $anggota['fname']?></li>
					<li class="list-group-item"><?= date('d F Y', $anggota['date_created']); ?></li>
					<li class="list-group-item"><?= $anggota['no_ktp']?></li>
					<li class="list-group-item"><?= $anggota['kelamin']?></li>
					<li class="list-group-item"><?= $anggota['alamat']?></li>
					<li class="list-group-item"><?= $anggota['no_telp']?></li>
				</ul>
			</div>
			<a class="btn btn-warning mt-3" href="<?= base_url('koperasi/anggota')?>">Kembali</a>
		</div>
	</div>
</div>