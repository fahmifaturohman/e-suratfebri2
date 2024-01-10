<?php
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi/koneksi.php";
$sql2 = $koneksi->query("select * from tb_profile ");  $profile=$sql2->fetch_assoc();
?>

    <style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 20px 30px; background-color: #cccccc;}
	.tabel td{padding: 20px 30px;}
	 img{width:125px; height:130px;}
	 td{font-size:13px;}
	 th{font-size:10px;}

	 .style2 {
    color: black;
    font-weight: bold;
    margin-left:20px ;

}
	</style>


  <script>
  

      window.print();
      window.onfocus=function() {window.close();}
        
  

</script>
</head>

<body onload="window.print()">


<?php 

    
  $id = $_GET['id'];
  $sql1 = $koneksi->query("select * from tb_disposisi,  m_dispos, tb_asal_tujuan, ref_klasifikasi where tb_disposisi.teruskan=m_dispos.id_dispos and tb_disposisi.kode_surat=ref_klasifikasi.id and tb_disposisi.asal_surat=tb_asal_tujuan.id_asal_tujuan and tb_disposisi.id='$id'");
  $tampil=$sql1->fetch_assoc();

 ?>

  <?php

   
    $sql = $koneksi->query("select * from tb_profile");
    $data = $sql->fetch_assoc();

?>

    

<table class="tabel" width="750" border="1">
  <tr>
  <td colspan="0"><img src="logopta1.png" alt="logopta1" width="100" style="padding-right: 10px;">
            </td>
  <td colspan="2"><strong style="font-size: 12px;">MAHKAMAH AGUNG REPUBLIK INDONESIA</strong></div><div align="center"><strong style="font-size: 12px;">DIREKTORAT JENDERAL BADAN PERADILAN AGAMA</strong></div><div align="center"><strong style="font-size: 12px;">PENGADILAN TINGGI AGAMA PALEMBANG</strong></div><div align="center"><strong style="font-size: 10px;">Jl. Jenderal Sudirman No.43 KM.3.5 Telp.0711-351170 Fax.3511170 Palembang-30126 <br>Website : www.pta-palembang.go.id Email: cs@pta-palembang.go.id</div></td></tr>
    <br>
    </tr>
    <tr>
    <td height="20" colspan="3"><div align="center"><strong style="font-size: 18px;">LEMBAR DISPOSISI</strong></div></td>
  </tr>
  <tr>
    <td height="12" colspan="3"><div align="center"><strong style="font-size: 10px;">PERHATIAN : Dilarang memisahkan sehelai Naskah Dinas pun yang tergabung dalam berkas ini</strong></div></td>
  </tr>
  <td colspan="0">Nomor Naskah Dinas :<br> <?php echo $tampil['Nomor'] ?>
    Tanggal Naskah Dinas : <?php echo $tampil['batas'] ?>
    <br>
    Lampiran : <?php echo $tampil['m_disposisi'] ?>
    <td colspan="1">Status : <?php echo $tampil['Sifat Surat'] ?>
    <br>
    Sifat : <?php echo $tampil['m_disposisi'] ?>
    <br>
    Jenis : <?php echo $tampil['m_disposisi'] ?>
    <br>
    <td colspan="1">Diterima Tanggal : <br><?php echo $tampil['batas'] ?>
    <br>
    Nomor Agenda: <?php echo $tampil['kode'] ?>
 <tr>
 <td colspan="3">Dari :<?php echo $tampil['asal_tujuan'] ?>
  <br>
    Hal: <?php echo $tampil['perihal'] ?>
 <tr>
 <td colspan="0">[ ] SANGAT SEGERA :<span style="margin-left: 89px">:<br>
 <td colspan="2">[ ] SEGERA<br>
  </tr>
  <tr>
    <td colspan="0">DISPOSISI KEPADA :<span style="margin-left: 20px">:<br>
      <br> [ ]KETUA
      <br> [ ]WAKIL KETUA
      <br> [ ]PANITERA
      <br> [ ]SEKRETARIS
      <br> [ ]KABAG PERENCANAAN DAN KEPEGAWAIAN
      <br> [ ]KABAG UMUM DAN KEUANGAN
      <br> [ ]PANMUD HUKUM
      <br> [ ]PANMUD BANDING
      <br> [ ]KASUBBAG KEUANGAN DAN PELAPORAN
      <br> [ ]KASUBBAG RENCANA, PROGRAM DAN ANGGARAN
      <br> [ ]KASUBBAG KEPEGAWAIAN DAN TI
      <br> [ ]KASUBBAG TATA USAHA DAN RUMAH TANGGA
      <br>
      <br>
      <br>
      <br>CATATAN :
    </span><?php echo $tampil['ket'] ?>
    <td colspan="2">PETUNJUK<br>
    <br> [ ]Setuju ketentuan yang berlaku
    <br> [ ]Tolak ketentuan yang berlaku
    <br> [ ]Selesai ketentuan yang berlaku
    <br> [ ]Jawab kebutuhan yang berlaku
    <br> [ ]Perbaiki
    <br> [ ]Teliti & pendapat
    <br> [ ]Sesuai Catatan
    <br> [ ]Untuk Perhatian
    <br> [ ]Untuk diketahui
    <br> [ ]Edarkan
    <br> [ ]Bicarakan dengan saya
    <br> [ ]Bocarakan bersama dan laporkan hasilnya
    <br> [ ]Dijadwalkan
    <br> [ ]Simpan
    <br> [ ]Disiapkan
    <br> [ ]Ingatkan
    <br> [ ]Harap dihadiri/diwakili
    <br> [ ]Asli Kepada ...............
  </tr>
  <tr>
  <br>
  <td colspan="0">Tanggal Kirim Untuk Proses<br> <?php echo $tampil['batas'] ?>. 
  Diterima Oleh: <?php echo $tampil['nama_bagian'] ?>
  <br>
  <td colspan="2">Diajukan Kembali Tanggal<br> <?php echo $tampil['batas'] ?>.
  Diterima Oleh: <?php echo $tampil['nama_bagian'] ?>
  </tr>
  <tr>
  <td colspan="0">Tanggal Kembali untuk Proses <br> <?php echo date('d F Y', strtotime($tampil['batas'])) ?>, Diterima Oleh: <?php echo $tampil['nama_bagian'] ?></td>
  <td colspan="2">Tanggal Selesai dari Pejabat yang mendisposisi <br> <?php echo $tampil['batas'] ?></td>
  </tr>
</table>
  </tbody>
