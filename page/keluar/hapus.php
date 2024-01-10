<?php

	$id = $_GET['id'];

	$query = "SELECT * FROM tb_surat_keluar WHERE no_agenda = '$id'";
	$ambil = $koneksi->query($query);
	$data = $ambil->fetch_assoc();

	$pdf= $data['foto'];

	if (file_exists("file/keluar/$pdf")) {
		unlink("file/keluar/$pdf");
	}


	$sql = $koneksi->query("delete from tb_surat_keluar where id='$id'");
	

	?>
		<script>
		    setTimeout(function() {
		        sweetAlert({
		            title: 'OKE!',
		            text: 'Data Berhasil Dihapus!',
		            type: 'success'
		        }, function() {
		            window.location = '?page=keluar';
		        });
		    }, 300);
		</script>


	<?php

 ?>
