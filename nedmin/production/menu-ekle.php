
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
                       <h2>Menyu Əlavə Etmək 
                        <small>
                      
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
                       <form action="../netting/islem.php" method="POST" id="menuekleform" data-parsley-validate class="form-horizontal form-label-left">
                      
                     
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" placeholder="Menyu adını daxil edin" for="first-name">Menyu Adı <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text"  id="first-name" name="menu_ad" required="required" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Menyu Detay <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="first-name" name="menu_detay" required="required" class="form-control col-md-7 col-xs-12" name="menu_detay" id="" cols="30" rows="10"></textarea>
                             
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Durumu <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control" name="menu_durum" id="">
                                 <option value="1">Aktiv</option>
                                 <option value="0">Passiv</option>
                             </select>
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menyu Url <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" placeholder="Menyu url daxil edin" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menyu Sıra <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text"  id="first-name" name="menu_sira" required="required" placeholder="Menyu sıra daxil edin" class="form-control col-md-7 col-xs-12">
                           </div>
                         </div>
                       
                         <div class="ln_solid"></div>
                         <div class="form-group">
                           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button type="submit" name="menyuekle" class="btn btn-success">Yeni Menyu Əlavə Elə</button>
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