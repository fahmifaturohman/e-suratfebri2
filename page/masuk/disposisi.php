<script type="text/javascript">
    function validasi(form){
        if (form.catatan.value=="") {
            alert("Catatan Surat Tidak Boleh Kosong");
            form.catatan.focus();
            return(false);
        }
        return(true);
    }
</script>

<?php

    $id=$_GET['id'];
    $sql = $koneksi->query("select * from tb_surat_masuk where id='$id'");
    $data = $sql->fetch_assoc();

    $tgl_surat = $data['tgl_surat'];
    $tgl_terima= $data['tanggal_terima'];
    $asal = $data['asal_surat'];
    $sifat = $data['sifat_surat'];
    $perihal = $data['perihal'];
    $agenda = $data['no_agenda'];
    $kode_surat = $data['kode_surat'];
    $indeks = $data['indeks'];
    $tujuan = $data['tujuan'];
    $arr_sifat = [
        'b' => "Biasa", 's' => "Sangat Penting", 'p' => 'Penting', 'r' => 'Rahasia'
    ];
    $no_surat = $data['no_surat'];

    $disposisi = $koneksi->query("SELECT * FROM `tb_disposisi_masuk` WHERE no_surat = '$no_surat'  ORDER BY id ASC");
    $ds = $disposisi->fetch_assoc();
    $ct = (!$ds) ? 0:count($ds);
?>


<div class="box box-success box-solid">
    <div class="box-header with-border">
        Disposisi Surat Masuk
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)" >
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Surat</label>
                                <input class="form-control" name="no" value="<?php echo $data['no_surat'] ?>" readonly=""  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sifat Surat</label>
                                <input class="form-control" name="sifat" value="<?=$arr_sifat[$data['sifat_surat']]?>" readonly=""  />
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label>Perihal Surat</label>
                        <input class="form-control" name="perihal" value="<?php echo $data['perihal'] ?>" readonly=""  />
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" name="status" id="input-status">
                                    <option value="disposisi">Disposisi</option>
                                    <option value="distribusi">Distribusi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Sifat <span class="text-sifat">Disposisi</span></label>
                                <select class="form-control select2" name="sifat" id="input-sifat">
                                    <option value="segera">Segera</option>
                                    <option value="sangat segera">Sangat Segera</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><span class="text-tujuan">Disposisikan</span> Ke</label>
                                <select class="form-control select2" name="id_tujuan" id="input-tujuan">
                                <?php
                                $sql = $koneksi->query("select * from tb_tujuan");
                                while ($data=$sql->fetch_assoc()) {
                                echo "
                                <option value='$data[id_tujuan]'>$data[nama_tujuan]</option>
                                ";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    
                    <div class="form-group">
                        <label>Catatan <span class="text-petunjuk">Disposisi</span></label>
                        <select class="form-control select2" name="petunjuk" id="input-petunjuk">
                            <?php 
                                $sql = $koneksi->query("select * from tb_disposisi_petunjuk");
                                while ($data=$sql->fetch_assoc()) {
                                echo "
                                <option value=".$data['id'].">".ucwords($data['petunjuk'])."</option>
                                ";
                                }
                            ?>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="catatan" id="catatan"></textarea>
                    </div>                    
                    <input type=button value=Kembali onclick=self.history.back() class="btn btn-default" />
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>

<?php if($ct > 0) { ?>
<div class="box box-primary box-solid">
    <div class="box-header with-border">
        Riwayat Disposisi Surat
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Tanggal Disposisi</th>
                <th>Status</th>
                <th>Disposisi Dari</th>
                <th>Disposisi Ke</th>
                <th>Jabatan</th>
                <th>Catatan</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $qd = $koneksi->query("SELECT * FROM `tb_disposisi_masuk` WHERE no_surat = '$no_surat'  ORDER BY id ASC");
                    while ($view=$qd->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=date('Y-m-d H:i', strtotime($view['create_at']))?></td>
                        <td><?=$view['status']?></td>
                        <td><?=$view['dari']?></td>
                        <td><?=$view['ttd']?></td>
                        <td><?=$view['jabatan']?></td>
                        <td><?=$view['catatan']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>

                                
 


 <?php
 	$no = $_POST ['no'];
 	$terus = $_POST ['id_tujuan'];
    $catatan = $_POST['catatan'];
    $status = $_POST['status'];
    $sifat = $_POST['sifat'];
    $petunjuk = $_POST['petunjuk'];
 	$simpan = $_POST ['simpan'];

 	if ($simpan) {
        $tujuan = $koneksi->query("SELECT a.*, b.nama_user FROM `tb_tujuan` a LEFT JOIN tb_user b ON a.id_tujuan = b.level_pimpinan where a.id_tujuan = '$terus' LIMIT 1");
        $tj = $tujuan->fetch_assoc();
        $ttd = $tj['nama_user'];
        $jabatan = $tj['nama_tujuan'];
        $dari = $_SESSION['nama_user'];
        $id_dari = $_SESSION['level_pimpinan'];

 	    $sql = $koneksi->query("INSERT INTO tb_disposisi_masuk SET no_surat = '$no', id_dari = '$id_dari', dari = '$dari', id_tujuan = '$terus', ttd = '$ttd', id_petunjuk='$petunjuk', jabatan = '$jabatan', catatan = '$catatan', `status` = '$status', sifat='$sifat'");
        $sql = $koneksi->query("update tb_surat_masuk set status=1, disposisi='$terus' where no_agenda = '$agenda'");
 			if ($sql) {
                echo "
                    <script>
                        setTimeout(function() {
                            swal({
                                title: 'Selamat!',
                                text: 'Disposisi Berhasil !',
                                type: 'success'
                            }, function() {
                                window.location = '?page=disposisi';
                            });
                        }, 300);
                    </script>
                ";
                }

     }

 ?>


<script>
    $(document).ready(function() {
        $(document).on('change', '#input-status', function() {
            var val = $(this).val()
            if(val == 'disposisi') {
                $('.text-sifat').text('Disposisi')
                $('.text-tujuan').text('Disposisi')
                $('.text-petunjuk').text('Disposisi')
            }
            else {
                $('.text-sifat').text('Distribusi')
                $('.text-tujuan').text('Distribusi')
                $('.text-petunjuk').text('Distribusi')
            }
        })
        $(document).on('change', '#input-petunjuk', function() {
            var val = $('#input-petunjuk').find('option:selected').text();
            val = val.trim()
            $('#catatan').val(val)
        })
    })
</script>