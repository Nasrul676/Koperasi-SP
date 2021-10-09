<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			
			<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><?= $simpanan_anggota['nama_anggota']?></li>
					<li class="list-group-item"><?= date('d F Y', $simpanan_anggota['date_created']); ?></li>
					<li class="list-group-item"><?= $simpanan_anggota['no_ktp']?></li>
					<li class="list-group-item"><?= $simpanan_anggota['no_kk']?></li>
					<li class="list-group-item"><?= $simpanan_anggota['no_telp']?></li>
					<li class="list-group-item"><?= $simpanan_anggota['simpanan_pokok']?></li>
					<li class="list-group-item"><?= $simpanan_anggota['alamat']?></li>
					<li class="list-group-item"><?= $simpanan_anggota['stats_kurtosis']?></li>
				</ul>
			</div>
			<a class="btn btn-warning mt-3" href="<?= base_url('koperasi/pokok')?>">Kembali</a>
		</div>
	</div>
</div>