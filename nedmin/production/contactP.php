
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
                       <h2>Əlaqə Parametrləri 
                        <small>
                           <?php
                            if(isset($_GET["status"])) {
                              if($_GET["status"] == "empty") {?>
                                <b style="padding: 10px; background: black; color: yellow">Hər Hansısa məlumat və ya bütün məlmatlar boş göndərilib.</b>
                              <?php
                              } else if($_GET["status"] == "ok") {?>
                                  <b style="padding: 10px; background: black; color: green">Məlumatlar uğurla yeniləndilər.</b>
                              <?php
                              } else {?>
                                  <b style="padding: 10px; background: black; color: red">Məlumatların yenilənməsi zamanı xəta.</b>
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
                       <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Nömrəsi <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$ayar_tel?>" id="first-name" name="ayar_tel" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Nömrəsi(GSM) <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_gsm?>" type="text" id="first-name" name="ayar_gsm" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Faks Nömrəsi <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_faks?>" type="text" id="first-name" name="ayar_faks" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresi <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_mail?>" type="text" id="first-name" name="ayar_mail" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şəhər <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_seher?>" type="text" id="first-name" name="ayar_seher" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rayon <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_rayon?>" type="text" id="first-name" name="ayar_rayon" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_adres?>" type="text" id="first-name" name="ayar_adres" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesai <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_mesai?>" type="text" id="first-name" name="ayar_mesai" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="contacts" class="btn btn-success">Yenilə</button>
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