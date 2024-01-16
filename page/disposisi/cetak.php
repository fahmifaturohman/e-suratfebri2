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

      .item {
        text-align: left;
      }

      .main-dev {
        display: inline-flex;
        grid-template-columns: 1fr 1fr;
        width: max-content;
      }

      td.padding-med {
          padding: unset;
          padding-left: 0.5rem;
          padding-top: 0.8rem;
          padding-bottom: 0.8rem;
      }

      td.kepada {
        padding: unset;
        margin: unset;
        padding-left: 1rem !important;
        padding-top: 0rem;
        padding-bottom: 3rem;
        border-top: none !important;
        vertical-align: baseline;
      }
	</style>


  <script>
  

      window.print();
      window.onfocus=function() {window.close();}
        
  

</script>
</head>

<body onload="window.print();">


<?php 

    
  $id = $_GET['id'];
  $dari = $_GET['dari'];
  $sql1 = $koneksi->query("select * from tb_disposisi,  m_dispos, tb_asal_tujuan, ref_klasifikasi where tb_disposisi.teruskan=m_dispos.id_dispos and tb_disposisi.kode_surat=ref_klasifikasi.id and tb_disposisi.asal_surat=tb_asal_tujuan.id_asal_tujuan and tb_disposisi.id='$id'");
  $tampil=$sql1->fetch_assoc();

 ?>

  <?php

   
    $sql = $koneksi->query("select * from tb_profile");
    $data = $sql->fetch_assoc();

?>


<?php 
    $query = "SELECT a.*, b.tgl_surat, b.tanggal_terima, b.sifat_surat, b.perihal, b.no_agenda, b.indeks, b.tahun, b.asal_surat, b.tujuan, c.asal_tujuan, d.nama_tujuan 
              FROM tb_disposisi_masuk a 
              LEFT JOIN tb_surat_masuk b ON a.no_surat = b.no_surat 
              LEFT JOIN tb_asal_tujuan c ON b.asal_surat = c.id_asal_tujuan 
              LEFT JOIN tb_tujuan d ON b.tujuan = d.id_tujuan 
              WHERE b.id = $id and a.id = $dari";
    $sql3 = $koneksi->query($query);
    $view = $sql3->fetch_assoc();

    function tgl_indo($tanggal){
      $tanggal = date('Y-m-d', strtotime($tanggal));
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);     
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    $arr_sifat = [
        'b' => "Biasa", 's' => "Sangat Penting", 'p' => 'Penting', 'r' => 'Rahasia'
    ];
?>

    

    <table class="tabel" width="750" border="1">
      <tr>
          <td width="1" style="border-right: none !important;padding: inherit;">
              <center><img src="logopta1.png" alt="logopta1" width="3" style="width: 5rem;height: auto; margin-left: 1rem;"></center>
          </td>
          <td colspan="2" style="padding:inherit;border-left:none !important;border-right:none !important">
            <center>
                <strong>MAHKAMAH AGUNG REPUBLIK INDONESIA</strong><br>
                <strong>DIREKTORAT JENDERAL BADAN PERADILAN AGAMA</strong><br>
                <strong>PENGADILAN TINGGI AGAMA PALEMBANG</strong><br>
                <span style="font-size:12px !important">Jl. Jenderal Sudirman No.43 KM.3.5 Telp.0711-351170 Fax.3511170 Palembang-30126<br>
                Website : www.pta-palembang.go.id Email: cs@pta-palembang.go.id</span>
            </center>
          </td>
          <td style="color: white;border-left: none !important;"></td>
      </tr>
      <tr>
        <td colspan="4" style="padding: 0.2rem !important;"><center><strong>LEMBAR DISPOSISI</strong></center></td>
      </tr>
      <tr>
        <td colspan="4" style="padding: 0.2rem !important;"><center><strong>PERHATIAN : Dilarang memisahkan sehelai Naskah Dinas pun yang tergabung dalam berkas ini</strong></center></td>
      </tr>
    </table>



    <table class="tabel" width="750" border="1" style="margin-top: -1.18rem;border-top:none !important">
      <tr>
          <td class="padding-med">
              <div class="main-dev">
                  <div class="item" style="width:130px !important">Nomor Naskah Dinas</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=$view['no_surat']?></div>
              </div>
              <div class="main-dev">
                  <div class="item" style="width:130px !important">Tanggal Naskah Dinas</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=tgl_indo($view['tgl_surat'])?></div>
              </div>
              <div class="main-dev">
                  <div class="item" style="width:130px !important">Lampiran</div>
                  <div class="item" style="margin-right:4px">: </div>
                  <div class="item"><?=$view['indeks']?> File</div>
              </div>
          </td>           
          <td class="padding-med">
              <div class="main-dev">
                  <div class="item" style="width:50px !important">Status</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=ucwords($view['status'])?></div>
              </div>
              <div class="main-dev">
                  <div class="item" style="width:50px !important">Sifat</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=$arr_sifat[$view['sifat_surat']]?></div>
              </div>
              <div class="main-dev">
                  <div class="item" style="width:50px !important">Jenis</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item">Surat Masuk</div>
              </div>
          </td>        
          <td class="padding-med">
              <div class="main-dev">
                  <div class="item" style="width:100px !important">Diterima Tanggal</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=tgl_indo($view['tanggal_terima'])?></div>
              </div>
              <div class="main-dev">
                  <div class="item" style="width:100px !important">No Agenda</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=$view['no_agenda']?></div>
              </div>
          </td> 
      </tr>
      <tr>
          <td colspan="3" class="padding-med">
              <div class="main-dev">
                  <div class="item" style="width:50px !important">Dari</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=$view['asal_tujuan']?></div>
              </div><br>
              <div class="main-dev">
                  <div class="item" style="width:50px !important">Hal</div>
                  <div class="item" style="margin-right:4px">:</div>
                  <div class="item"><?=$view['perihal']?></div>
              </div>
          </td>
      </tr>
      <tr>
        <td colspan="0"><center>[<?=($view['sifat'] == 'sangat segera') ? '&#10003;':'&nbsp;&nbsp;&nbsp;' ?>] SANGAT SEGERA</center>
        <td colspan="2"><center>[<?=($view['sifat'] == 'segera') ? '&#10003;':'&nbsp;&nbsp;&nbsp;' ?>] SEGERA</center>
      </tr>
      
      <tr>
        <td class="padding-med" style="border-bottom:none !important">DISPOSISI KEPADA :</td>
        <td class="padding-med" style="border-bottom:none !important" colspan="2">PETUNJUK :</td>
      </tr>

      <tr>
        <td class="kepada">
            <?php 
            $tj = $koneksi->query("SELECT * FROM `tb_tujuan` WHERE urutan IS NOT NULL order by urutan ASC");
            while ($vtj=$tj->fetch_assoc()) { ?>
            <br><?=($vtj['id_tujuan'] == $view['id_tujuan']) ? '[&#10003;]':'[&nbsp;&nbsp;&nbsp;]' ?> <label style="padding-top:-100px"><?=ucwords($vtj['nama_tujuan'])?></label>
            <?php } ?>
            <br><br>
            <u>CATATAN : <br></u><?=$view['catatan']?>
        </td>
        <td class="kepada" colspan="2">
            <?php 
            $ptj = $koneksi->query("SELECT * FROM `tb_disposisi_petunjuk` WHERE deleted = 0 order by id ASC");
            while ($vptj=$ptj->fetch_assoc()) { ?>
            <br><?=($vptj['id'] == $view['id_petunjuk']) ? '[&#10003;]':'[&nbsp;&nbsp;&nbsp;]' ?> <label style="padding-top:-100px"><?=ucwords($vptj['petunjuk'])?></label>
            <?php } ?>
        </td>
      </tr>
      <tr>
        <br>
        <td colspan="0">Tanggal Kirim Untuk Proses : <?=tgl_indo($view['create_at'])?>. <br>
        Diterima Oleh: <?=ucwords($view['dari'])?>
        <br>
        <td colspan="2">Diajukan Kembali Tanggal : <?=tgl_indo($view['create_at'])?>.<br>
        Diterima Oleh: <?=ucwords($view['ttd']) ?>
      </tr>
    <tr>
    <td colspan="0">Tanggal Kembali untuk Proses <br> <?=tgl_indo($view['create_at'])?>, Diterima Oleh: <?=ucwords($view['dari'])?></td>
    <td colspan="2">Tanggal Selesai dari Pejabat yang mendisposisi <br> <?=tgl_indo($view['create_at'])?></td>
    </tr>
    </table>
  </tbody>
