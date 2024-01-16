<marquee>Selamat Datang Di Aplikasi E-SURAT </marquee>
<?php

if ($_SESSION['admin']) {
	$sql = $koneksi->query("select * from tb_surat_masuk where tahun = YEAR(NOW())");
	while($data=$sql->fetch_assoc()){
       $masuk=$sql->num_rows;
	}

  $sql = $koneksi->query("select *, tb_surat_keluar.id id_surat 
          from tb_surat_keluar
          left join ref_klasifikasi on tb_surat_keluar.kode_surat=ref_klasifikasi.id
          left join tb_asal_tujuan on
          tb_surat_keluar.kepada=tb_asal_tujuan.id_asal_tujuan WHERE (year(tb_surat_keluar.tanggal_keluar) = YEAR(NOW()))
          ORDER BY tb_surat_keluar.id DESC");
	while($data=$sql->fetch_assoc()){
       $keluar=$sql->num_rows;
	}

  $sql = $koneksi->query("select * from tb_disposisi");
	while($data=$sql->fetch_assoc()){
       $disposisi=$sql->num_rows;
	}


}else{

  $sql = $koneksi->query("select a.*, b.*, c.*,d.*, a.id id_surat, e.dari status_disposisi 
  FROM tb_surat_masuk a
  LEFT JOIN tb_disposisi_masuk b ON a.no_surat = b.no_surat
  LEFT JOIN tb_asal_tujuan c ON a.asal_surat = c.id_asal_tujuan
  LEFT JOIN ref_klasifikasi d on a.kode_surat = d.id
  LEFT JOIN tb_disposisi_masuk e ON a.no_surat = e.no_surat and e.id_dari = '$_SESSION[level_pimpinan]'
  WHERE b.id_tujuan = '$tujuan' and a.tahun = YEAR(NOW()) GROUP BY a.no_surat");
  while($data=$sql->fetch_assoc()){
       $masuk=$sql->num_rows;
  }

  $sql = $koneksi->query("select *, tb_surat_keluar.id id_surat from tb_surat_keluar
          left join ref_klasifikasi on tb_surat_keluar.kode_surat=ref_klasifikasi.id
          left join tb_asal_tujuan on
          tb_surat_keluar.kepada=tb_asal_tujuan.id_asal_tujuan WHERE (year(tb_surat_keluar.tanggal_keluar) = YEAR(NOW())) and tb_surat_keluar.kepada = '$tujuan'
          ORDER BY tb_surat_keluar.id DESC");
  while($data=$sql->fetch_assoc()){
       $keluar=$sql->num_rows;


  }

  $sql = $koneksi->query("select * from tb_disposisi where tujuan='$tujuan'");
  while($data=$sql->fetch_assoc()){
       $disposisi=$sql->num_rows; 


  }

}

 




?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=($masuk == 0) ? 0:$masuk; ?></h3>
              <p>Surat Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-email-unread "></i>
            </div>
            <a href="?page=masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3><?=($keluar == 0) ? 0:$keluar; ?></h3>

              <p>Surat Keluar</p>
            </div>
            <div class="icon">
              <i class="ion ion-email"></i>
            </div>
            <a href="?page=keluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $disposisi; ?></h3>

              <p>Disposisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=disposisi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->

        
