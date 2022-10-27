
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
                       <h2>Api Parametrləri 
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
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail User <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$smtp_user?>" id="first-name" name="smtp_user" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>  
                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail smtp portu <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$ayar_smtpport?>" id="first-name" name="ayar_smtpport" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                       

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail smtp hostu <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$ayar_smtphost?>" id="first-name" name="ayar_smtphost" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail smtp şifrəsi <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="password" value="<?=$ayar_smtppassword?>" id="first-name" name="ayar_smtppassword" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                     
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="mail" class="btn btn-success">Yenilə</button>
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