<?php

    $id = $_GET['id'];
    $query = "SELECT * FROM tb_surat_masuk WHERE id = '$id'";
	$ambil = $koneksi->query($query);
	$data = $ambil->fetch_assoc();

	$pdf= $data['file_surat'];

	if (file_exists("file/masuk/$pdf")) {
		unlink("file/masuk/$pdf");
	}


	$koneksi->query("delete from tb_surat_masuk where id ='$_GET[id]'");
  	//$koneksi->query("delete from tb_disposisi where no_agenda='$_GET[id]'");

    //echo json_encode($data);





?>
  <script>
      setTimeout(function() {
          sweetAlert({
              title: 'OKE!',
              text: 'Data Berhasil Dihapus!',
              type: 'success'
          }, function() {
              window.location = '?page=masuk';
          });
      }, 300);
  </script>


