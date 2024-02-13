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
                                        <li class="active"><a href="#Popular" data-toggle="tab">Cari Tiket</a></li>
                                    </ul>

                                    <div  class="tab-content clearfix">
                                        <div class="tab-pane fade active in" id="Popular">
                                       <form id="contactForm" action="index.php?p=pilih-tiket" method="GET">
                                             <div class="col-md-4">
                                             <input type="hidden" name="p" value="pilih-tiket">
                                             <div class="row">
                                <div class="form-group">
                                     <div class="col-md-12">
                                     <label>Tujuan</label>
                                        <div class="input-group"  style="padding-bottom: 5px;">
                                        <div class="input-group-addon"><i class="fa fa-arrow-right"></i></div>
                                        <select name="tj" id="select" class="form-control">
                                        <option value="">-Tujuan-</option>
                                        <?php  

                            include './config/koneksi.php';

                                        $sql=mysqli_query($koneksi,"SELECT * FROM tujuan");
                                            while($q=mysqli_fetch_array($sql)){

                                                   ?>
                                        <option value="<?php echo $q['kode_tujuan']; ?>"><?php echo $q['nama_tujuan']; ?></option>
                                        <?php } ?>
                                      </select>
                                      </div>
                                      <i>* Tujuan keberangkatan anda</i>
                                    </div>
                                </div></div>
                                             </div>
                                             <div class="col-md-4">
                                             <div class="row">
                                                <div class="form-group">
                                     <div class="col-md-12">
                                     <label>Tanggal Berangkat</label>
                                       <div class="input-group date" style="padding-bottom: 5px;">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" name="tb" class="form-control" placeholder="Tanggal Berangkat" id="datepickercari">
                                          
                                          </div>
                                        
                                          <i>* Tanggal anda berangkat</i>
                                     
                                </div>
                                </div>
                                             </div>
                                             </div>
                                                 <div class="col-md-4">
                                               <div class="row">
                                <div class="form-group"  style="padding-bottom: 5px;">
                                 <label style="padding-left: 15px;">Jumlah Penumpang</label>
                                     <div class="col-md-12">
                                       
                                     <div class="row">
                                        <div class="col-md-6">
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                        <select name="jpd" id="select" class="form-control">
                                        <option value="0">-Dewasa-</optiom>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                      </select>
                                      </div>
                                      </div>

                                       <div class="col-md-6">
                                      
                                        <select name="jpa" id="select" class="form-control">
                                        <option value="0">-Anak-anak-</optiom>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                      </select>
                                     
                                      </div>
                                      </div>

                                      <i>* Jumlah tiket yang akan dipesan, isi sesuai kebutuhan.</i>
                                  
                                     </div>
                                </div>
                                </div>
                                 

                                             <div class="col-md-12">
                                             <p>
                                              <div class="row">
                                <div class="col-md-12">
                                    <button  type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg btn-cari"><i class="fa fa-search"></i> Cari tiket</button>
                                </div>
                            </div></div>
                                             </form>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
               <div class="container">
            <div class="row super_sub_content">
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 green">
                        <div class="service-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="service-content">
                            <h3>Nahkoda</h3>
                            <p> Nakkoda yang ahli dibidang nya dan sudah berpengalaman.</p>
                            <div class="read">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 purple">
                        <div class="service-icon">
                            <i class="fa fa-ship"></i>
                        </div>
                        <div class="service-content">
                            <h3>Kapal</h3>
                            <p> Kapal yang nyaman, yang bersertifikat lulus uji.</p>
                            <div class="read">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 red">
                        <div class="service-icon">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                        <div class="service-content">
                            <h3>Tujuan</h3>
                            <p> Memiliki beberapa rute tujuan, yang telah sering dilalui .</p>
                            <div class="read">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="serviceBox_2 blue">
                        <div class="service-icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="service-content">
                            <h3>Harga</h3>
                            <p> Harga sesuai dengan fasilitas yang bersahabat dengan masyarakat.</p>
                            <div class="read">
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>
          </div>
 </section>
