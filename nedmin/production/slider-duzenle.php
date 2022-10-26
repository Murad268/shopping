
<?php
   include_once("header.php");

   if(isset($_GET["slider_id"])) {
      $slider_id = $_GET["slider_id"];
   } else {
      header("Location: slider.php");
   }
   $slidersor=$db->prepare("SELECT * FROM carusel WHERE slider_id = $slider_id");
   $slidersor->execute();
   $slider = $slidersor->fetch(PDO::FETCH_ASSOC);  
?>
   
  
   
           <!-- page content -->
           <div class="right_col" role="main">
             <div class="">
             
               <div class="clearfix"></div>
               <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                       <h2>Slider Düzənləmə 
                        <small>
                           <?php
                            if(isset($_GET["status"])) {
                              if($_GET["status"] == "ok") {?>
                                  <b style="padding: 10px; background: black; color: green">Məlumatlar uğurla yeniləndilər.</b>
                              <?php
                              } else if($_GET["status"] == "bigsize") {?>
                                 <b style="padding: 10px; background: black; color: red">Şəklin ölçüsü 1 mbdan çox olmamalıdır.</b>
                               <?php
                               } else if($_GET["status"] == "wrongformat") {?>
                                 <b style="padding: 10px; background: black; color: yellow">Düzgün şəkil formatı deyil(icaze verilən formatlar: jpeg, jpg, png).</b>
                               <?php
                              } 
                            }
                           ?>
                        </small></h2>
                       <ul class="nav navbar-right panel_toolbox">
                         <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                         </li>
                         <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                           <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Settings 1</a>
                             </li>
                             <li><a href="#">Settings 2</a>
                             </li>
                           </ul>
                         </li>
                         <li><a class="close-link"><i class="fa fa-close"></i></a>
                         </li>
                       </ul>
                       <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                       <br />
                       <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                           <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş Şəkil<br><span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">

                              <?php 
                              if (strlen($ayar_logo>0)) {?>

                              <img width="200"  src="../../<?php echo $slider["slider_src"] ?>">

                              <?php } else {?>


                              <img width="200"  src="../../dimg/logo-yok.png">


                              <?php } ?>

                              
                           </div>
                           </div>
                      
                           <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="first-name"  name="slider_img"  class="form-control col-md-7 col-xs-12">
                           </div>
                           </div>
                           <input type="hidden" name="slider_id" value="<?=$slider_id?>">
                           <input type="hidden" name="eski_yol" value="<?php echo $slider["slider_src"]; ?>">

                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <button type="submit" name="caruselresimduzenle" class="btn btn-primary">Yenilə</button>
                           </div>

                           </form>

                           <hr>
                           <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hansı Məhsula aiddir<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select id="heard" class="form-control" name="urun_id" required>
                                 <?php
                                    $urunleriSorgula = $db->prepare("SELECT * FROM urunler");
                                    $urunleriSorgula->execute();
                                    $urunler = $urunleriSorgula->fetchAll(PDO::FETCH_ASSOC);
                                   
                                    foreach($urunler as $urun) {?>
                                       <option <?=$slider["urun_id"] == $urun["urun_id"]?"selected":null?>  value="<?=$urun["urun_id"]?>"><?=$urun["urun_ad"]?></option>
                                    <?php
                                    }
                                 ?>


                                 
                                 </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider detay <span class="required">*</span>
                                 </label>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="slider_detay" class="form-control col-md-7 col-xs-12"><?=$slider["slider_detay"]?></textarea>
                                 </div>
                              </div>
                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input value="<?=$slider["slider_ad"]?>" type="text" id="first-name" name="slider_ad"  required="required" placeholder="Slider adını daxil edin" class="form-control col-md-7 col-xs-12">
                              </div>
                           </div>

                           


                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Url <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" id="first-name" name="slider_link" value="<?=$slider["slider_link"]?>"  placeholder="Slider Link daxil edin" class="form-control col-md-7 col-xs-12">
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" id="first-name" value="<?=$slider["slider_sira"]?>"  name="slider_sira"  required="required" placeholder="Slider sıra daxil edin"  class="form-control col-md-7 col-xs-12">
                              </div>
                           </div>


                        <input type="hidden" name="slider_id" value="<?=$slider_id?>">


                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="heard" class="form-control" name="slider_durum" required>

                                 <option <?=$slider["slider_durum"]=="1"?"selected":""?> value="1" >Aktif</option>
                                 <option <?=$slider["slider_durum"]=="0"?"selected":""?> value="0" >Pasif</option>
                                 


                              </select>
                           </div>
                           </div>


                           <div class="ln_solid"></div>
                           <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" name="sliderduzenle" class="btn btn-success">Yadda saxla</button>
                           </div>
                           </div>

                        </form>
                     </div>
                   </div>
                 </div>
               </div>
   
      

   
   
   
     
             </div>
           </div>
           <!-- /page content -->
   
           <!-- footer content -->
   <?php
      require_once("footer.php");
   ?>