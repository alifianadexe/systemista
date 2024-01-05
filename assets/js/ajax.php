<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	window.onload = function() {
		tampilPasien();
		tampilKlinik();
		tampilKota();
		<?php
		if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() {
			$('.form-msg').fadeOut(1000);
		}, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() {
			$('.msg').fadeOut(1000);
		}, 3000);
	}

	function tampilPasien() {
		$.get('<?php echo base_url('Pasien/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pasien').html(data);
			refresh();
		});
	}

	var id_pasien;
	$(document).on("click", ".konfirmasiHapus-pasien", function() {
		id_pasien = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPasien", function() {
		var id = id_pasien;

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Pasien/delete'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#konfirmasiHapus').modal('hide');
				tampilPasien();
				$('.msg').html(data);
				effect_msg();
			})
	})

	$(document).on("click", ".update-dataPasien", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Pasien/update'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-pasien').modal('show');
			})
	})

	$('#form-tambah-pasien').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Pasien/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilPasien();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-pasien").reset();
					$('#tambah-pasien').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pasien', function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Pasien/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilPasien();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-pasien").reset();
					$('#update-pasien').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$('#tambah-pasien').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})

	$('#update-pasien').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Kota/delete'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#konfirmasiHapus').modal('hide');
				tampilKota();
				$('.msg').html(data);
				effect_msg();
			})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Kota/update'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-kota').modal('show');
			})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Kota/detail'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#tabel-detail').dataTable({
					"paging": true,
					"lengthChange": false,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
				$('#detail-kota').modal('show');
			})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Kota/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilKota();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-kota").reset();
					$('#tambah-kota').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilKota();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-kota").reset();
					$('#update-kota').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})

	//Klinik
	function tampilKlinik() {
		$.get('<?php echo base_url('Klinik/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-klinik').html(data);
			refresh();
		});
	}

	var id_klinik;
	$(document).on("click", ".konfirmasiHapus-klinik", function() {
		id_klinik = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKlinik", function() {
		var id = id_klinik;

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Klinik/delete'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#konfirmasiHapus').modal('hide');
				tampilKlinik();
				$('.msg').html(data);
				effect_msg();
			})
	})

	$(document).on("click", ".update-dataKlinik", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Klinik/update'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-klinik').modal('show');
			})
	})

	$(document).on("click", ".detail-dataKlinik", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Klinik/detail'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#tabel-detail').dataTable({
					"paging": true,
					"lengthChange": false,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
				$('#detail-klinik').modal('show');
			})
	})

	$('#form-tambah-klinik').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Klinik/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilKlinik();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-klinik").reset();
					$('#tambah-klinik').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-klinik', function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Klinik/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilKlinik();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-klinik").reset();
					$('#update-klinik').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$('#tambah-klinik').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})

	$('#update-klinik').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})
</script>