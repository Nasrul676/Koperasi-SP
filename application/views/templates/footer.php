<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>asset/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>asset/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>asset/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>asset/js/sb-admin-2.min.js"></script>
<script src="<?= base_url() ?>asset/DataTables/datatables.min.js"></script>





<script>
	$('.custom-file-input').on('change', function(){
		let filename = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass('selected').html(filename);
	})
</script>

<script>
	$(document).ready(function() {
    $('#mytabel').DataTable();
} );
</script>
<script type="text/javascript">
	const flashdata = $('.flash-data').data('flashdata')


if (flashdata) {
	Swal({
		title : 'Data Berhasil ' + flashdata ,
		type: 'success'
	});
}

</script>



</body>

</html> 