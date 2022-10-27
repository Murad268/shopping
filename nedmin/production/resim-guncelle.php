
<?php
   include_once("header.php");

   $__RESİMSORGUSU = $db->prepare("SELECT * FROM urunfoto WHERE urunfoto_id   = ?");
   $__RESİMSORGUSU->execute([$_GET["resimid"]]);
   $__RESİM = $__RESİMSORGUSU->fetch(PDO::FETCH_ASSOC);
   $urunleregit = $db->prepare("SELECT * FROM urunler WHERE urun_id = ? LIMIT 1");
   $urunleregit->execute([$__RESİM["urun_id"]]);
   $urun = $urunleregit->fetch(PDO::FETCH_ASSOC);
?>
   

   
           <!-- page content -->
           <div class="right_col" role="main">
             <div class="">
             
               <div class="clearfix"></div>
               <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                       <h2>Rəsim Düzənləmə 
                        <small>
                           <?php
                           if(isset($_GET["status"])) {
                              if($_GET["status"] == "empty") {?>
                              <b style="color: blue">Hər Hansısa məlumat və ya bütün məlmatlar boş göndərilib.</b>
                              <?php
                              } else if($_GET["status"] == "ok") {?>
                                 <b style="color: green">Məlumatlar uğurla yeniləndilər.</b>
                              <?php
                              } else if($_GET["status"] == "error"){?>
                                 <b style="color: red">Məlumatların yenilənməsi zamanı xəta.</b>
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
                     
                         </li>
                       </ul>
                       <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                       <br />
                       <form action="../netting/islem.php?resimid=<?=$_GET["resimid"]?>" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məhsulun Adı<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input disabled="" type="text" id="first-name" value="<?=$urun["urun_ad"]?>" name="urunresmi"  class="form-control col-md-7 col-xs-12">
                              </div>
                           </div>
                           <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş Şəkil<br><span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">

                              <?php 
                              if (strlen($ayar_logo>0)) {?>

                              <img width="200"  src="../../<?php echo $__RESİM["urun_fotoresimyol"] ?>">

                              <?php } else {?>


                              <img width="200"  src="../../dimg/logo-yok.png">


                              <?php } ?>

                              
                           </div>
                           </div>

                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rəsim Seç<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="file" id="first-name"  name="urunresmi"  class="form-control col-md-7 col-xs-12">
                              </div>
                           </div>

                           <input type="hidden" name="eski_yol" value="<?php echo $__RESİM["urun_fotoresimyol"]; ?>">

                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <button type="submit" name="resimduzenle" class="btn btn-primary">Yenilə</button>
                           </div>

                           </form>

                           <hr>
                           <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                           <input type="hidden" name="resimid" value="<?=$_GET["resimid"]?>">
                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rəsim Sırası <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" value="<?=$__RESİM["urunfoto_sira"]?>" id="first-name" name="urunfoto_sira" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                           </div>
                        
                           <div class="ln_solid"></div>
                           <div class="form-group">
                              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" name="setimgorder" class="btn btn-success">Yenilə</button>
                              </div>
                           </div>
                           </form>
                     </div>
                   </div>
                 </div>
               </div>
   
      

   
   
   
     
             </div>
           </div>

           <script src="../../js/script.js"></script>
   <?php
      require_once("footer.php");
   ?>