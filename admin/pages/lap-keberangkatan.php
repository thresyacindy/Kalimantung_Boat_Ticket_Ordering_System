   <?php
error_reporting(0);
include '../../config/koneksi.php';

if(isset($_POST['bln'])) { 
$cari1=" AND month(tanggal)='$_POST[bln]'";
$bln=$_POST['bln'];
}else { $cari1=""; $bln="";}

if(isset($_POST['thn'])) { $cari2=" AND year(tanggal)='$_POST[thn]'";
$thn=$_POST['thn'];
}else { $cari2=""; $thn="";}

?>
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Keberangkatan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Keberangkatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

             <form id="form1" name="form1" method="post" action="">
              <div class="box">
                <div class="box-header">
                  <div class="col-md-3"><h3 class="box-title">Laporan Tiket</h3></div>
                  <div class="col-md-3">
                   <select name="bln" id="select" class="form-control" onchange="this.form.submit();">
                        <option>-Bulan-</option>
                        <option value="1" <?php if ($bln==1) echo "selected"; else echo ""; ?>>Januari</option>
                        <option value="2" <?php if ($bln==2) echo "selected"; else echo ""; ?>>Februari</option>
                        <option value="3" <?php if ($bln==3) echo "selected"; else echo ""; ?>>Maret</option>
                        <option value="4" <?php if ($bln==4) echo "selected"; else echo ""; ?>>April</option>
                        <option value="5" <?php if ($bln==5) echo "selected"; else echo ""; ?>>Mei</option>
                        <option value="6" <?php if ($bln==6) echo "selected"; else echo ""; ?>>Juni</option>
                        <option value="7" <?php if ($bln==7) echo "selected"; else echo ""; ?>>Juli</option>
                        <option value="8" <?php if ($bln==8) echo "selected"; else echo ""; ?>>Agustus</option>
                        <option value="9" <?php if ($bln==9) echo "selected"; else echo ""; ?>>Sepember</option>
                        <option value="10" <?php if ($bln==10) echo "selected"; else echo ""; ?>>Oktober</option>
                        <option value="11" <?php if ($bln==11) echo "selected"; else echo ""; ?>>November</option>
                        <option value="12" <?php if ($bln==12) echo "selected"; else echo ""; ?>>Desember</option>
                      </select></div>
                     <div class="col-md-2">
                      <select name="thn" id="select" class="form-control" onchange="this.form.submit();">
                      <option>-Tahun-</option>
                        <option value="2013" <?php if ($thn==2013) echo "selected"; else echo ""; ?>>2013</option>
                        <option value="2014" <?php if ($thn==2014) echo "selected"; else echo ""; ?>>2014</option>
                        <option value="2015" <?php if ($thn==2015) echo "selected"; else echo ""; ?>>2015</option>
                        <option value="2016" <?php if ($thn==2016) echo "selected"; else echo ""; ?>>2016</option>
                        <option value="2017" <?php if ($thn==2017) echo "selected"; else echo ""; ?>>2017</option>
                      </select></div>
  <a href="pages/cetak-lap-keberangkatan.php?thn=<?php echo $thn; ?> && bln=<?php echo $bln; ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <table class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Tiket</th>
                        <th>Tanggal Berangkat</th>
                        <th>Jam Berangkat</th>
                        <th>Tujuan</th>
                        <th>Kapal</th>
                        <th>Nahkoda</th>
                        <th>Jumlah Penumpang</th>
                        <th>Surat izin</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                    include '../../config/koneksi.php';
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tiket.id_nahkoda,tiket.jam_berangkat,tiket.id_kapal,tiket.id_tujuan,nahkoda.nama_nah,tujuan.nama_tujuan,kapal.nama_kapal,berangkat. * FROM tiket,nahkoda,tujuan,kapal,berangkat WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and nahkoda.kode_nah=tiket.id_nahkoda and tiket.kode_tiket=berangkat.id_tiket $cari1 $cari2");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['id_tiket']; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($q['tanggal'])); ?></td>
                        <td><?php echo date('H:i',strtotime($q['tanggal'])); ?></td>
                        <td><?php echo $q['id_tujuan'].' / '.$q['nama_tujuan']; ?></td>
                        <td><?php echo $q['id_kapal'].' / '.$q['nama_kapal']; ?></td>
                        <td><?php echo $q['id_nahkoda'].' / '.$q['nama_nah']; ?></td>
                        <td><?php echo $q['jml_penumpang']; ?></td>
                        <td><?php echo $q['no_surat_izin']; ?></td>
                        <td><?php if($q['status']=='P'){
                          echo "Pergi";
                          }else{
                            echo "Balik";
                            } ?></td>
                        </tr>
                      <?php } ?>
                     <tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->