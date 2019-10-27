$(function() {

	$('.tombolTambahData').on('click', function() {
		$('#formModalLabel').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
	});

	$('.tampilModalUbah').on('click', function() {
		$('#formModalLabel').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

		const id = $(this).data('id');
		
		
		$.ajax({
			url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
			data: {Id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#nama').val(data.Nama);
				$('#nrp').val(data.Nrp);
				$('#email').val(data.Email);
				$('#jurusan').val(data.Jurusan);
				$('#id').val(data.Id);
			}
		});

		$('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
   	 });
  });

}); 