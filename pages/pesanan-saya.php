<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Pesan Tiket Saya</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Pesan saya</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dividerHeading">
                            <h4><span>Data pesanan Saya</span></h4>
                        </div>
                    
           <table id="example1" class="table table-hover">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Penumpang</th>
                        <th>Nomor Kursi</th>
                        <th>Kategori Tiket</th>
                        <th>Tujuan</th>
                        <th>Tanggal Berangkat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                        session_start();
                     $id=$_SESSION['us'];
                    
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.hrg_tiket_dewasa,tiket.kode_tiket,pesan. * FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and kode_member='$id'");

                    $qu=mysqli_fetch_array($sql);
                     if($qu['status']=="1"){
                        
                             echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Silahkan tunggu beberapa menit, total pembayaran akan muncul setelah dikonfirmasi.
                                  </div>';

                        }else if($qu['status']=="2"){
                             echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Silahkan Lakukan pembayaran ke nomor rekening kami sebelum 3 jam setelah pemesanan.
                                  </div>';
                        }else if($qu['status']=="3"){
                             echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Pesanan anda telah berhasil silahkan cetak tiket anda.
                                  </div>';

                        }else{
                           echo '<div class="alert alert-info alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Anda belum memiliki pesanan.
                                  </div>';
                        }
                         $sql2=mysqli_query($koneksi,"SELECT tujuan.nama_tujuan,kursi.nok,tiket.hrg_tiket_dewasa,tiket.jam_berangkat,tiket.kode_tiket,tiket.jam_berangkat,pesan. * FROM tiket,tujuan,kursi,pesan WHERE tujuan.kode_tujuan=tiket.id_tujuan and kursi.idk=pesan.idk and pesan.kode_tiket=tiket.kode_tiket and kode_member='$id'");
                      
                         
                      while($q=mysqli_fetch_array($sql2)){

                          $sq3=mysqli_query($koneksi,"SELECT * FROM confirm_pembayaran WHERE id_member='$id'");
                          $q2=mysqli_fetch_array($sq3);

                        $no++;
                        $tobay=$q2['total_bayar'];
                        if($q['status']=="1"){
                            $stt="<b>Menunggu Total pembayaran.</b>";


                        }else if($q['status']=="2"){
                            $stt="<b>Menunggu Pembayaran.</b>";
                        }else{
                            $stt="<b>LUNAS</b>";

                        }

                     ?>
                     
                      <tr>
                        <td><br><?php echo $no; ?> <br></td>
                        <td><br><?php echo $q['nm_penumpang']; ?> <br></td>
                        <td><br><?php echo $q['nok']; ?> <p></td>
                        <td><br><?php echo $q['ktgr_tiket']; ?> <br></td>
                        <td><br><?php echo $q['nama_tujuan']; ?> <br></td>
                        <td><br><?php echo date('d M Y',strtotime($q['tgl_berangkat'])); ?>, Jam <?php echo date('H:i',strtotime($q['jam_berangkat'])); ?><br></td>
                        <td><br><?php echo $stt; ?> <br></td>
                        <?php 
                        if($stt=="<b>LUNAS</b>"){
                        echo'<td><br><a href="pages/cetak-pesanan-saya.php?id='.$q['id_pesan'].'" class="btn btn-warning"><i class="fa fa-print"></i></a></td>';
                            }else{
                                echo'<td></td>';
                            }
                        ?>
                       </tr>

                      <?php } ?>
                      <tr>
                      <td colspan="4"></td> 
                         <td colspan="1"><b>TOTAL</b></td> 
                         <td colspan="3" style="font-size: 25px;"><b> Rp <?php  echo number_format($tobay,0,".",".");  ?></b></td> 
                      </tr>
                     <tbody>
                    
                  </table>

                  <div class="alert alert-info alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>  Silahkan lakukan transfer atau kirim lewat rekening bank kami dibawah ini dan pastikan mengirim dengan nomor rekening yang benar serta total bayar sesuai dengan yang ada diatas sampat 3 digit terakhir .
                                  </div>
                
                               <blockquote class='default' style="font-size: 16px;">
                               <i class="fa fa-credit-card"></i> Bank BRI</b>
                               <hr style="border: 1px solid #727CB6;">
                               <h2> 04939284723</h2>
                               </blockquote>
                            
                           
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->