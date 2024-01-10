<marquee>Selamat Datang Di Aplikasi E-SURAT </marquee>
<?php

if ($_SESSION['admin']) {
	$sql = $koneksi->query("select * from tb_surat_masuk where tahun = YEAR(NOW())");
	while($data=$sql->fetch_assoc()){
       $masuk=$sql->num_rows;


	}

  $sql = $koneksi->query("select * from tb_surat_keluar WHERE tahun = YEAR(NOW())");
	while($data=$sql->fetch_assoc()){
       $keluar=$sql->num_rows;


	}

  $sql = $koneksi->query("select * from tb_disposisi");
	while($data=$sql->fetch_assoc()){
       $disposisi=$sql->num_rows;


	}


}else{

  $sql = $koneksi->query("select * from tb_surat_masuk where tujuan='$tujuan'");
  while($data=$sql->fetch_assoc()){
       $masuk=$sql->num_rows;


  }

  $sql = $koneksi->query("select * from tb_surat_keluar where tujuan='$tujuan'");
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
              <h3><?php echo $keluar; ?></sup></h3>

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

        
