
<?php
   include_once("header.php");
?>
   
           <!-- top navigation -->
           <div class="top_nav">
             <div class="nav_menu">
               <nav>
                 <div class="nav toggle">
                   <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                 </div>
   
                 <ul class="nav navbar-nav navbar-right">
                   <li class="">
                     <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                       <img src="images/img.jpg" alt="">John Doe
                       <span class=" fa fa-angle-down"></span>
                     </a>
                     <ul class="dropdown-menu dropdown-usermenu pull-right">
                       <li><a href="javascript:;"> Profile</a></li>
                       <li>
                         <a href="javascript:;">
                           <span class="badge bg-red pull-right">50%</span>
                           <span>Settings</span>
                         </a>
                       </li>
                       <li><a href="javascript:;">Help</a></li>
                       <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                     </ul>
                   </li>
   
                   <li role="presentation" class="dropdown">
                     <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                       <i class="fa fa-envelope-o"></i>
                       <span class="badge bg-green">6</span>
                     </a>
                     <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                       <li>
                         <a>
                           <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                           <span>
                             <span>John Smith</span>
                             <span class="time">3 mins ago</span>
                           </span>
                           <span class="message">
                             Film festivals used to be do-or-die moments for movie makers. They were where...
                           </span>
                         </a>
                       </li>
                       <li>
                         <a>
                           <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                           <span>
                             <span>John Smith</span>
                             <span class="time">3 mins ago</span>
                           </span>
                           <span class="message">
                             Film festivals used to be do-or-die moments for movie makers. They were where...
                           </span>
                         </a>
                       </li>
                       <li>
                         <a>
                           <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                           <span>
                             <span>John Smith</span>
                             <span class="time">3 mins ago</span>
                           </span>
                           <span class="message">
                             Film festivals used to be do-or-die moments for movie makers. They were where...
                           </span>
                         </a>
                       </li>
                       <li>
                         <a>
                           <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                           <span>
                             <span>John Smith</span>
                             <span class="time">3 mins ago</span>
                           </span>
                           <span class="message">
                             Film festivals used to be do-or-die moments for movie makers. They were where...
                           </span>
                         </a>
                       </li>
                       <li>
                         <div class="text-center">
                           <a>
                             <strong>See All Alerts</strong>
                             <i class="fa fa-angle-right"></i>
                           </a>
                         </div>
                       </li>
                     </ul>
                   </li>
                 </ul>
               </nav>
             </div>
           </div>
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
                       <form action="../../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook Linki <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" value="<?=$ayar_facebook?>" id="first-name" name="ayar_facebook" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Twitter Linki <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_twitter?>" type="text" id="first-name" name="ayar_twitter" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google Linki <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_google?>" type="text" id="first-name" name="ayar_google" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Youtube Linki <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input value="<?=$ayar_youtube?>" type="text" id="first-name" name="ayar_youtube" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="social" class="btn btn-success">Yenilə</button>
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