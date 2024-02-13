<!--start wrapper-->
<section class="wrapper">
<div class="slider-wrapper">
    <div class="slider">
        <div class="fs_loader"></div>
        <div class="slide">
            <img src="./assets/images/fraction-slider/base_1.jpeg" width="1920" height="450" data-in="fade" data-out="fade" />
        </div>

        <div class="slide">
            <img src="./assets/images/fraction-slider/base_2.jpeg" width="1920" height="450" data-in="fade" data-out="fade" />
        </div>

         <div class="slide">
            <img src="./assets/images/fraction-slider/base_3.jpeg" width="1920" height="450" data-in="fade" data-out="fade" />
        </div>

        <div class="slide">
            <img src="./assets/images/fraction-slider/base_4.jpeg" width="1920" height="450" data-in="fade" data-out="fade" />
        </div>
    </div>
</div>
<!--End Slider-->
  <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      
          <div class="widget widget_tab">
                                <div class="velocity-tab sidebar-tab">
                                    <ul  class="nav nav-tabs">
                                        <li class="active"><a href="#Popular" data-toggle="tab">Isi Formulir</a></li>
                                    </ul>

                                    <div  class="tab-content clearfix">
                                        <div class="tab-pane fade active in" id="Popular">
                                       <form id="contactForm" action="index.php?p=pilih-tiket" method="GET">
                                             <div class="col-md-6">
                                             <input type="hidden" name="p" value="proses_pesan">
                                             <input type="hidden" name="idt" value="<?php echo $_GET['idt']; ?>">
                                             <input type="hidden" name="tgl" value="<?php echo $_GET['tb']; ?>">
                                             <input type="hidden" name="jlmp" value="<?php $jmls=$_GET['jpd']+$_GET['jpa']; echo $jmls; ?>">
                                              <?php
                                              $jmls=$_GET['jpd']+$_GET['jpa'];
                                                  for ($i=1; $i <= $jmls; $i++) { 
                                              ?>
                                             <div class="penumpang">
                                             <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                     <label>Nama Lengkap</label>
                                        <input type="text" name="nml<?php echo $i; ?>" class="form-control" required>
                                         <i>* Nama penumpang yang akan berangkat sesuai dengan identitas asli.</i>
                                      </div>
                                      <div class="col-md-6">
                                     <label>Tanggal Lahir</label>
                                     <style type="text/css">
                                       #tgll{
                                        font-size: 11px !important;
                                        padding: 3px !important;
                                       }
                                     </style>
                                  <div class="row">
                                  <?php
                                  echo "<div class='col-md-4'><select name=tgl".$i." class=form-control id=tgll>
                                  <option value=0>-Tgl-</option>";
                                  for ($no=1;$no<=31;$no++)
                                  {
                                  echo "<option value=$no>$no</option>";
                                  }
                                  echo "</select></div>";

                                  $nm_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                  echo "<div class='col-md-4'><div class='row'><select name=bln".$i." class=form-control id=tgll>
                                  <option value=0>-Bln-</option>";
                                  for ($bln=1; $bln<=12; $bln++)
                                  {
                                  echo "<option value=$bln>$nm_bulan[$bln]</option>";
                                  }
                                  echo "</select></div></div>";

                                  $thn_skrg=date('Y');
                                  echo "<div class='col-md-4'><select name=thn".$i." class=form-control id=tgll>
                                  <option value=0 selected>-Thn-</option>";
                                  for ($thn=1980;$thn<=$thn_skrg;$thn++)
                                  {
                                  echo "<option value=$thn>$thn</option>";
                                  }
                                  echo "</select></div>";
                                  ?>
                                  </div>

                                         <i>* Tanggal Lahir penumpang.</i>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group"  style="padding-bottom: 5px;">
                                     <div class="col-md-4">
                                        <label>Nomor Kursi</label>
                                     <select name="nk<?php echo $i; ?>" id="select" class="form-control" required>
                                        <option value="">-Nomor Kursi-</option>
                                        <?php  

                            include './config/koneksi.php';
$a=$_GET['jpd']+$_GET['jpa'];
                                        $sql=mysqli_query($koneksi,"SELECT * FROM kursi,tiket,kapal WHERE NOT EXISTS(SELECT * FROM pesan WHERE kursi.idk=pesan.idk) and kapal.kode_kapal=kursi.id_kapal and kapal.kode_kapal=tiket.id_kapal and tiket.kode_tiket='$_GET[idt]'order by idk asc  limit $a");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['idk']; ?>"><?php echo $q['nok']; ?></option>
                                        <?php } ?>
                                      </select>
                                    
                                      <i>* Pastikan anda tidak memesan nomor kursi yang sama.</i>
                                    </div>

                                     <div class="col-md-4">
                                        <label>Kategori Tiket</label>
                                     <select name="kt<?php echo $i; ?>" id="select" class="form-control" required>
                                        <option value="">-Kategori-</option>
                                        <option value="Dewasa">Dewasa</option>
                                        <option value="Anak">Anak-anak</option>
                                        
                                      </select>
                                    
                                      <i>* Kategori tiket yang dipesan.</i>
                                    </div>
                                         <div class="col-md-4">
                                        <label>Bagasi barang</label>
                                     <select name="bg<?php echo $i; ?>" id="bg" class="form-control" required>
                                        <?php  

                                        $sq4=mysqli_query($koneksi,"SELECT * FROM bagasi order by id_bagasi asc");
                                            while($qb=mysqli_fetch_array($sq4)){

                                                   ?>
                                        <option value="<?php echo $qb['id_bagasi']; ?>"><?php echo $qb['jml_bagasi']; ?> kg (Rp <?php echo number_format($qb['harga'],0,".","."); ?>)</option>
                                        <?php } ?>
                                      </select>
                                    
                                      <i>* Pilih sesuai berat barang bawaan anda.</i>
                                    </div>
                                </div>
                                </div>
                                
                                </div>
                                <br>
                                <?php } ?>
                              
                                 
                           
                               <div class="row">
                               <div class="col-md-6">
                                <label>Nomor telephone</label>
                                 <input type="text" name="nohp" class="form-control" required>
                                 <i>* Kontak yang dapat dihubungi.</i> 
                                 </div> 
                                 <div class="col-md-6">
                                  <label>Email</label>
                                 <input type="email" name="email" class="form-control" required>
                                 <i>* Email untuk menerima pemberitahuan.</i> 
                                 </div>
                                 </div>     
                                     
                                             
                                             <p>
                                              <div class="row">
                                <div class="col-md-12">
                                    <button  type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg btn-cari">Selanjutnya</button>
                                </div>
                            </div>

                               <?php  

                                        $sql2=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kapal.nama_kapal,tiket.hrg_tiket_ank2,tiket.hrg_tiket_dewasa FROM tujuan,kapal,tiket WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and kode_tiket='$_GET[idt]'");
                                           $qr=mysqli_fetch_array($sql2)

                                                   ?>
                                
                                             </div>
                                             <div class="col-md-5">
                                          
                                             <label>Rincian Keberangkatan</label>
                                             <blockquote class="default">
                                               Tujuan :
                                               <p class="rincian"><b><?php echo $qr['nama_tujuan']; ?></b></p>
                                               Tanggal Berangkat :
                                               <p class="rincian"><b><?php echo date('d F Y',strtotime($_GET['tb'])); ?></b></p>
                                               Kapal :
                                               <p class="rincian"><b><?php echo $qr['nama_kapal']; ?></b></p>

                                             </blockquote>

                                               <label>Rincian Harga</label>
                                             <blockquote class="default">
                                               Jumlah Penumpang :
                                               <p style="padding-left: 15px;">Dewasa: <b><?php echo $_GET['jpd']; ?> Orang</b></p>
                                               <p style="padding-left: 15px;">Anak-anak: <b><?php echo $_GET['jpa']; ?> Orang</b></p>
                                               Harga :
                                               <p style="padding-left: 15px;">Dewasa: <b>Rp <?php echo number_format($qr['hrg_tiket_dewasa'],0,".","."); ?> / Tiket</b></p>
                                                <p style="padding-left: 15px;">Anak-anak: <b>Rp <?php echo number_format($qr['hrg_tiket_ank2'],0,".","."); ?> / Tiket</b></p>
                                               Total :
                                               <p style="font-size: 20px;padding-left: 15px;"><b>Rp 
                                                 <?php 
                                               $htd=$_GET['jpd']*$qr['hrg_tiket_dewasa'];
                                              $hta=$_GET['jpa']*$qr['hrg_tiket_ank2'];

                                              $tot=$htd+$hta;

                                              echo number_format($tot,0,".",".");

                                                
                                               ?>
                                               <!-- <script type="text/javascript">
                                                $(document).ready(function(e) {
                                                  var tot='<?php //echo $tot; ?>';
                                                   var reverse = tot.toString().split('').reverse().join(''),
                                                    ribuan  = reverse.match(/\d{1,3}/g);
                                                    ribuan  = ribuan.join('.').split('').reverse().join('');
                                                   $('.toth').html(ribuan);

                                                  $(document).on("change", "#bg", function(event) {


                                                                                                      
                                                     var bg = $('select[id=bg]').val();

                                                   

                                                          if(bg=='IBG-002'){
                                                            h=parseInt(tot)+20000;

                                                      var reverse = h.toString().split('').reverse().join(''),
                                                    ribuan  = reverse.match(/\d{1,3}/g);
                                                    ribuan  = ribuan.join('.').split('').reverse().join('');

                                                             $('.toth').html(ribuan);

                                                          }else if(bg=="IBG-003"){
                                                             h=parseInt(tot)+40000;

                                                      var reverse = h.toString().split('').reverse().join(''),
                                                    ribuan  = reverse.match(/\d{1,3}/g);
                                                    ribuan  = ribuan.join('.').split('').reverse().join('');

                                                             $('.toth').html(ribuan);

                                                      
                                                          }else{
                                                              var reverse = tot.toString().split('').reverse().join(''),
                                                    ribuan  = reverse.match(/\d{1,3}/g);
                                                    ribuan  = ribuan.join('.').split('').reverse().join('');

                                                           $('.toth').html(ribuan); 
                                                          }
                                                      });
                                               });

                                               </script> -->
                                                
                                              <span class='toth'></span>
                                               </b></p>
                                             </blockquote>
                                   
                                             </div>
                                        
                                             </form>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
          </div>
 </section>
