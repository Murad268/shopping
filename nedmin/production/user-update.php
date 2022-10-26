
<?php
   include_once("header.php");
   $__KULLANICISORGUSU = $db->prepare("SELECT * FROM users WHERE user_id = ?");
   $__KULLANICISORGUSU->execute([$_GET["userid"]]);
   $__KULLANICI = $__KULLANICISORGUSU->fetch(PDO::FETCH_ASSOC);
?>
   

   
           <!-- page content -->
           <div class="right_col" role="main">
             <div class="">
             
               <div class="clearfix"></div>
               <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                       <h2>İstifadəçi Düzənləmə 
                        <small>
                           <?php
                           if(isset($_GET["status"])) {
                              if($_GET["status"] == "empty") {?>
                              <b style="color: blue">Hər Hansısa məlumat və ya bütün məlmatlar boş göndərilib.</b>
                              <?php
                              } else if($_GET["status"] == "ok") {?>
                                 <b style="color: green">Məlumatlar uğurla yeniləndilər.</b>
                              <?php
                              } else {?>
                                 <b style="color: red">Məlumatların yenilənməsi zamanı xəta.</b>
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
                       <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                       <?php
                           $zaman = explode(" ", date("d.m.Y H:i:s", (int)$__KULLANICI["user_date"]));
                       ?>
                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qeydiyyat Tarixi <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input disabled type="text" value="<?=$zaman[0]?>" id="first-name" name="user_date" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                        </div>  
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qeydiyyat Saatı <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input disabled type="time" value="<?=$zaman[1]?>" id="first-name" name="user_date_time" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                        </div> 
                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TC <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$__KULLANICI["user_tc"]?>" id="first-name" name="user_tc" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$__KULLANICI["user_name"]?>" id="first-name" name="user_name"  class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İstifadəçi Emaili <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input disabled type="text" value="<?=$__KULLANICI["user_email"]?>" id="first-name" name="user_email" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İstifadəçi Durumu <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control" name="user_durum" id="">
                                 <option <?=$__KULLANICI["user_durum"] == 1 ? "selected":""?> value="1">Aktiv</option>
                                 <option <?=$__KULLANICI["user_durum"] == 0 ? "selected":""?> value="0">Passiv</option>
                             </select>
                           </div>
                         </div>
                         <input  type="hidden" name="user_id" value="<?=$__KULLANICI["user_id"]?>">
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="gullaniciguncelle" class="btn btn-success">Yenilə</button>
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