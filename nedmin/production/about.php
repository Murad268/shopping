
<?php
   include_once("header.php");
?>
 
           <!-- top navigation -->
   
           <!-- /top navigation -->
   
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
                       <form action="../netting/islem.php" method="POST" id="menuekleform" data-parsley-validate class="form-horizontal form-label-left">
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlıq <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$about_title?>" id="first-name" name="about_title" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məzmun <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="first-name" name="about_desc" required="required" class="form-control col-md-7 col-xs-12"  id="" cols="30" rows="10"><?=$about_desc?></textarea>
                             
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$about_video?>" type="text" id="first-name" name="about_video" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

								        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$about_vizyon?>" type="text" id="first-name" name="about_vizyon" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

								        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$about_misyon?>" type="text" id="first-name" name="about_misyon" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="about" class="btn btn-success">Yenilə</button>
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
           <script src="../../js/script.js"></script>
   <?php
      require_once("footer.php");
   ?>