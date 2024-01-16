<?php 
    $arr_sifat = ['b'=> 'Biasa', 'p'=> 'Penting','s'=>'Sangat Penting','r'=>'Rahasia'];
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                             Data Disposisi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example1">
                <thead>
                <tr>

                   <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>Tanggal Surat</th>
                      <th>Tanggal Terima</th>
                      <th>Asal</th>
                      <th>Sifat</th>
                      <th>Perihal</th>
                      <th>Disposisi Dari</th>
                      <th>Diteruskan</th>   
                      <th>Catatan</th>      
                      <th>Aksi</th>
                  </tr>
                </tr>
                </thead>


                <tbody>

                  <?php
                        $no = 1; $tahun = date('Y'); $tujuan = $_SESSION['level_pimpinan'];
                        if($_SESSION['level'] == 'admin') {
                        $query = "SELECT a.no_surat, a.id_tujuan, a.ttd, a.jabatan, a.catatan, a.id_dari, a.dari, a.id id_a, b.*, c.asal_tujuan asal FROM `tb_disposisi_masuk` a left JOIN tb_surat_masuk b ON a.no_surat = b.no_surat left JOIN tb_asal_tujuan c ON b.asal_surat = c.id_asal_tujuan WHERE b.tahun = '$tahun' ORDER BY b.id DESC";
                        } else {
                            $query = "SELECT a.no_surat, a.id_tujuan, a.ttd, a.jabatan, a.catatan, a.id_dari, a.dari, a.id id_a b.*, c.asal_tujuan asal 
                            FROM `tb_disposisi_masuk` a 
                            left JOIN tb_surat_masuk b ON a.no_surat = b.no_surat 
                            left JOIN tb_asal_tujuan c ON b.asal_surat = c.id_asal_tujuan 
                            WHERE b.tahun = '$tahun' and (a.id_dari = '$tujuan' OR a.id_tujuan = '$tujuan') 
                            ORDER BY b.id DESC";
                        }
                        $sql = $koneksi->query($query);

                        while ($data= $sql->fetch_assoc()) {
                   ?>

                  <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['no_surat'];?></td>
                          <td><?php echo date('d F Y', strtotime( $data['tgl_surat']));?></td>
                          <td><?php echo date('d F Y', strtotime( $data['tanggal_terima']));?></td>
                          <td><?php echo $data['asal'];?></td>
                          <td><?=$arr_sifat[$data['sifat_surat']];?></td>
                          <td><?php echo $data['perihal'];?></td>
                          <td><?=$data['dari']?></td>
                          <td><?php echo $data['jabatan'];?></td>
                          <td><?php echo $data['catatan'];?></td>
                         
                           <td>
                              <a href="page/disposisi/cetak.php?id=<?php echo $data['id']; ?>&dari=<?=$data['id_a']?>" target="pimpinan" class="btn btn-info btn-xs" ><i class="fa fa-print "></i> Cetak Disposisi</a>
                              
                          </td>
                      </tr>

                 <?php } ?>
                </tbody>

              </table>
            </div>


       <a id="lap_masuk" data-toggle="modal" data-target="#lap" style="margin-bottom:  px; margin-left: 5px;" class="btn btn-default"><i class="fa fa-print"></i> Cetak PDF</a>
        <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />

        <div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Disposisi</h4>
                                        </div>

                                        <div class="modal-body">
                                          <form role="form" method="POST" action="page/disposisi/laporan_disposisi.php" target="pimpinan" >

                                            
                                            <div class="form-group">
                                                <label>Dari Tanggal</label>
                                                <input class="form-control" type="date" name="tgl1" /> 
                                            </div>

                                             <div class="form-group">
                                                <label> Sampai Tanggal</label>
                                                <input class="form-control" type="date" name="tgl2" /> 
                                            </div>

                                           

                                            <div class="modal-footer">

                                           <button type="submit" name="cetak" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i> Cetak per Periode</button>
                                            
                                            <a href="page/disposisi/laporan_disposisi.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> Cetak Semua</a>

                                            

                                            
                                            </div>
                                            </div>  
                                      
                                        
                                        </form> 


    
                                    </div>
                                </div>
                           
                    </div>

        
