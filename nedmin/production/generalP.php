
<?php
   include_once("header.php");
?>
   

   
           <!-- page content -->
           <div class="right_col" role="main">
             <div class="">
             
               <div class="clearfix"></div>
               <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                       <h2>Ümumi Parametrlər 
                        <small>
                           <?php
                           if(isset($_GET["durum"])) {
                              if($_GET["durum"] == "empty") {?>
                              <b style="padding: 10px; background: black; color: yellow">Hər Hansısa məlumat və ya bütün məlmatlar boş göndərilib.</b>
                              <?php
                              } else if($_GET["durum"] == "ok") {?>
                                 <b style="padding: 10px; background: black; color: green">Məlumatlar uğurla yeniləndilər.</b>
                              <?php
                              } else if($_GET["durum"] == "error"){?>
                                 <b style="padding: 10px; background: black; color: red">Məlumatların yenilənməsi zamanı xəta.</b>
                              <?php
                              } else if($_GET["durum"] == "bigsize") {?>
                                <b style="padding: 10px; background: black; color: red">Şəklin ölçüsü 1 mbdan çox olmamalıdır.</b>
                              <?php
                              } else if($_GET["durum"] == "wrongformat") {?>
                                <b style="padding: 10px; background: black; color: yellow">Düzgün şəkil formatı deyil(icaze verilən formatlar: jpeg, jpg, png).</b>
                              <?php
                              } else {?>
                                <b style="padding: 10px; background: black; color: blue">Heç bir məlumat yenilənmədi.</b>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş Logo<br><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php 
                            if (strlen($ayar_logo>0)) {?>

                            <img width="200"  src="../../<?php echo $ayar_logo ?>">

                            <?php } else {?>


                            <img width="200"  src="../../dimg/logo-yok.png">


                            <?php } ?>

                            
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="first-name"  name="ayar_logo"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <input type="hidden" name="eski_yol" value="<?php echo $ayarcek['ayar_logo']; ?>">

                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="logoduzenle" class="btn btn-primary">Yenilə</button>
                        </div>

                        </form>

                        <hr>
                       <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                         
                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Başlığı <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$ayar_title?>" id="first-name" name="ayar_title" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Linki <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$site_linki?>" id="first-name" name="site_linki" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Açıqlaması <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_description?>" type="text" id="first-name" name="ayar_description" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Açar Sözləri <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_keywords?>" type="text" id="first-name" name="ayar_keywords" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Yazarı <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_author?>" type="text" id="first-name" name="ayar_author" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="general" class="btn btn-success">Yenilə</button>
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