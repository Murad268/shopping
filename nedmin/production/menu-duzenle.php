
<?php
   include_once("header.php");

   $__MENUSORGUSU = $db->prepare("SELECT * FROM menuler WHERE menu_id  = ?");
   $__MENUSORGUSU->execute([$_GET["menuid"]]);
   $__MENU = $__MENUSORGUSU->fetch(PDO::FETCH_ASSOC);
?>
   

   
           <!-- page content -->
           <div class="right_col" role="main">
             <div class="">
             
               <div class="clearfix"></div>
               <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                       <h2>Menyu Düzənləmə 
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
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Səhifə Linki <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$site_linki?>/sayfa-<?=seo($__MENU["menu_ad"])?>" id="first-name" name="menu_link" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menyu Adı <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$__MENU["menu_ad"]?>" id="first-name" name="menu_ad" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menyu Detay <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="first-name" name="menu_detay" required="required" class="form-control col-md-7 col-xs-12" name="menu_detay" id="" cols="30" rows="10"><?=$__MENU["menu_detay"]?></textarea>
                             
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Durumu <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control" name="menu_durum" id="">
                                 <option <?=$__MENU["menu_durum"] == 1 ? "selected":""?> value="1">Aktiv</option>
                                 <option <?=$__MENU["menu_durum"] == 0 ? "selected":""?> value="0">Passiv</option>
                             </select>
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menyu Url <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$__MENU["menu_url"]?>" id="first-name" name="menu_url"  class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menyu Sıra <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$__MENU["menu_sira"]?>" id="first-name" name="menu_sira" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <input  type="hidden" name="menu_id" value="<?=$__MENU["menu_id"]?>">
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="menuguncelle" class="btn btn-success">Yenilə</button>
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