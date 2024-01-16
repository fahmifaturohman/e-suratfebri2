
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                             Data Surat Masuk Tahun <?=date("Y")?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                              <?php  if ($_SESSION['admin']) { ?>
                                 <a href="?page=masuk&aksi=tambah" class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah </a>

                              <?php } ?>   

                                  <a id="lap_masuk" data-toggle="modal" data-target="#lap" style="margin-bottom: 10px;; margin-left: 5px;" class="btn btn-default"><i class="fa fa-print"></i> Cetak PDF</a>

                                   <input style="margin-bottom: 10px;; margin-left: 5px;" type=button value=Kembali onclick=self.history.back() class="btn btn-info" />

                                <table class="table table-striped table-bordered table-hover" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Reg/Kode</th>
                                            <th>Asal Surat</th>
                                            <th>Perihal, File</th>
                                            <th>Nomor, Tanggal Surat</th>
                                            <th>Status Disposisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $tahun = date('Y');

                                           if ($_SESSION['admin']) {


                                            $no = 1;

                                            $sql = $koneksi->query("select a.*, b.*, c.*,d.*, a.id id_surat, e.dari status_disposisi 
                                            FROM tb_surat_masuk a
                                            LEFT JOIN tb_disposisi_masuk b ON a.no_surat = b.no_surat
                                            LEFT JOIN tb_asal_tujuan c ON a.asal_surat = c.id_asal_tujuan
                                            LEFT JOIN ref_klasifikasi d on a.kode_surat = d.id
                                            LEFT JOIN tb_disposisi_masuk e ON a.no_surat = e.no_surat and e.id_dari = '$_SESSION[level_pimpinan]'
                                            WHERE a.tahun = '$tahun' GROUP BY a.no_surat");

                                            

                                           }else{
                                                $no = 1;
                                                $tujuan = $_SESSION['level_pimpinan'];
                                                $sql = $koneksi->query("select a.*, b.*, c.*,d.*, a.id id_surat, e.dari status_disposisi 
                                                FROM tb_surat_masuk a
                                                LEFT JOIN tb_disposisi_masuk b ON a.no_surat = b.no_surat
                                                LEFT JOIN tb_asal_tujuan c ON a.asal_surat = c.id_asal_tujuan
                                                LEFT JOIN ref_klasifikasi d on a.kode_surat = d.id
                                                LEFT JOIN tb_disposisi_masuk e ON a.no_surat = e.no_surat and e.id_dari = '$_SESSION[level_pimpinan]'
                                                WHERE b.id_tujuan = '$tujuan' and a.tahun = '$tahun' GROUP BY a.no_surat");                            
                                           } 

                                            while ($data= $sql->fetch_assoc()) {

                                 

                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>

                                           
                                             <td><?php echo $data['no_agenda'];?>/<?php echo $data['kode'];?></td>
                                            <td><?php echo $data['asal_tujuan'];?> <br> <div style="color: red;"> [index: <?php echo $data['indeks'];?>]<div> </td>

                                            <td><?php echo $data['perihal'];?> <br> <a href="<?=$baseUrl?>file/masuk/<?=$data['file_surat']?>" target="_blank" download="<?=$data['file_surat']?>"><div style="color: green;"> [file: <?php echo $data['file_surat'];?>]</a><div> </td>
                                            <td><?php echo $data['no_surat'];?><br><?php echo date('d-m-Y', strtotime($data['tgl_surat']));?></td>
                                        
                                            <td>


                                              <?php if ($data['status_disposisi'] == NULL) {
                                              echo "Belum";
                                              }else{
                                                echo "Sudah";
                                              } 

                                            ?>
                                            </td>
                                           
                                             <td>
                                              <?php  if ($_SESSION['admin']) { ?>

                                               <a  href="https://api.whatsapp.com/send?phone=<?php echo  $data['no_hp'] ?>&text=Ada Surat Masuk Tanggal: <?php echo date('d-m-Y', strtotime($data['tanggal_terima']))?>, Dengan No Surat: <?php echo $data['no_surat']?>,  Tanggal Surat: <?php echo date('d-m-Y', strtotime($data['tgl_surat']))?>,  Asal Surat Dari:   <?php echo $data['asal_surat']?>, Dengan Tujuan Surat:   <?php echo $data['nama_tujuan']?>, Perihal:   <?php echo $data['perihal']?>  " target="blank" class="btn btn-success btn-xs"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                                                <a href="?page=masuk&aksi=ubah&id=<?php echo $data['id_surat']; ?>" class="btn btn-info btn-xs" ><i class="fa fa-edit "></i> Ubah</a>

                                              <?php } ?>  

                                                <?php if ($data['status']==0 || $data['status']==1) {
                                                  
                                                 ?>

                                                <a href="?page=masuk&aksi=disposisi&id=<?php echo $data['id_surat']; ?>" class="btn btn-success btn-xs" ><i class="fa fa-mail-forward "></i> Disposisi</a>

                                                <a disabled href="" class="btn btn-warning btn-xs" ><i class="fa fa-print "></i> Cetak Disposisi</a>

                                                <?php }else{ ?>

                                                    <a href="?page=masuk&aksi=disposisi&id=<?php echo $data['id_surat']; ?>" class="btn btn-success btn-xs" ><i class="fa fa-mail-forward "></i> Disposisi</a>

                                                <a target="blank" href="page/masuk/cetak_dispo.php?id=<?php echo $data['id_surat']; ?>" class="btn btn-warning btn-xs" ><i class="fa fa-print "></i> Cetak Disposisi</a>

                                                <?php } ?>

                                                <?php  if ($_SESSION['admin']) { ?>

                                                <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ... ???')" href="?page=masuk&aksi=hapus&id=<?php echo $data['id_surat']; ?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> Hapus</a>

                                                <?php } ?>

                                            </td>
                                        </tr>


                                        <?php  } ?>
                                    </tbody>

                                    </table>
                                  </div>

                                 


                        </div>
                     </div>
                   </div>
     </div>



<?php if ($_SESSION['admin']) {?>
 

        <div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Surat Masuk</h4>
                                        </div>

                                        <div class="modal-body">
                                          <form role="form" method="POST" action="page/masuk/cetak.php" target="blank" >

                                            
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
                                            
                                        

                                            

                                            
                                            </div>
                                            </div>  
                                      
                                        
                                        </form> 


    
                                    </div>
                                </div>
                           
                    </div>
<?php }else{ ?>


 <div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Surat Masuk</h4>
                                        </div>

                                        <div class="modal-body">
                                          <form role="form" method="POST" action="page/masuk/cetak_user.php" target="blank" >

                                            
                                            <div class="form-group">
                                                <label>Dari Tanggal</label>
                                                <input class="form-control" type="date" name="tgl1" /> 
                                            </div>

                                             <div class="form-group">
                                                <label> Sampai Tanggal</label>
                                                <input class="form-control" type="date" name="tgl2" /> 
                                            </div>

                                            <input class="form-control" type="hidden" name="tujuan" value="<?php echo $tujuan ?>" />

                                           

                                            <div class="modal-footer">

                                           <button type="submit" name="cetak" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i> Cetak per Periode</button>
                                            
                                        

                                            

                                            
                                            </div>
                                            </div>  
                                      
                                        
                                        </form> 


    
                                    </div>
                                </div>
                           
                    </div>

<?php } ?>