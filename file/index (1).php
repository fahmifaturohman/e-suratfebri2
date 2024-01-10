<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h2><center>Pusat Informasi Akta Cerai Pengadilan Agama Pringsewu</center></h2>
<br>
<br>
<div class="container">
    <div class="card">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="card-body">
          <div align="center">
            <h4>Contoh : 123/Pdt.G/2021/PA.Prw</h4>
          </div>
          <div class="input-group">
            <label for="cari_perkara" class="col-sm-2 col-form-label">Nomor Perkara:</label>
        <?php
        $kata_kunci="";
        $kata2="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
            $kata2=$_POST['kata2'];
        }
        ?>
       <input type="text" class="form-control col-sm-3" name="kata_kunci" placeholder="Nomor" value="" required="" oninvalid="this.setCustomValidity('Nomor Perkara Wajib Diisi')" oninput="setCustomValidity('')">
            <input type="text" class="form-control col-sm-3" name="jenis_perkara" value="Pdt.G" readonly="">
            <select name="kata2" class="form-control col-sm-3" required="">
                              <option value="2021">2021 </option>
                              <option value="2020">2020 </option>
                              <option value="2019">2019 </option>
                              <option value="2018">2018 </option>
                          </select>
            <input type="text" class="form-control col-sm-3" name="nama_pa" value="PA.Prw" readonly="">
        <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-search" value="Cari"></i>MUNCULKAN</button>
    </div>

    </form>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nomor Perkara</th>
            <th>Tgl Pendaftaran</th>
            <th>Tgl Putusan</th>
            <th>Jenis Perkara</th>
            <th>Status</th>

        </tr>
        </thead>
        <?php
    error_reporting(0);
        include "koneksi.php";
        if (isset($_POST['kata_kunci']) && ($_POST['kata2'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $kata2=trim($_POST['kata2']);
            $sql="select * from dataumumweb where noPerkara like '$kata_kunci/Pdt.G/$kata2/PA.Prw'";
        };

        $hasil=mysqli_query($kon,$sql);
        $no=0;

        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            $akta = $data["statusAkhir"] == 'Pembuatan Akta Cerai'? 'Akta Cerai Sudah Bisa Diambil' : $data["statusAkhir"];
            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["noPerkara"]; ?></td>
                <td><?php echo $data["tglPendaftaran"];   ?></td>
                <td><?php echo $data["tglPutusan"];   ?></td>
                <td><?php echo $data["jenisPerkara"];   ?></td>
                <td><?php echo $akta;   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>

</body>
</html>