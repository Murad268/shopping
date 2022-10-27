<?php 

include 'header.php'; 


$categorysor=$db->prepare("SELECT * FROM categories where category_id =:id");
$categorysor->execute(array(
  'id' => $_GET['kategori_id']
  ));

$categorycek=$categorysor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kateqoriya Yeniləmə <small>,

              <?php 

               if(isset($_GET["durum"])) {
                  if ($_GET['durum']=="ok") {?>

                     <b style="color:green;">Əməliyyat Uğurludu...</b>
       
                     <?php } elseif ($_GET['durum']=="no") {?>
       
                     <b style="color:red;">Əməliyyat Uğursuzdu...</b>
       
                     <?php }
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

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kateqoriya Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="category_ad" value="<?php echo $categorycek['category_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              
          

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kateqoriya Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="category_sira" value="<?php echo $categorycek['category_sira'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>





            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kateqoriya Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="keteqori_durum" required>



                  <option value="1" <?php echo $categorycek['keteqori_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>

                  <option value="0" <?php if ($categorycek['keteqori_durum']==0) { echo 'selected=""'; } ?>>Passif</option>
 
                 </select>
               </div>
             </div>


             <input type="hidden" name="category_id" value="<?php echo $categorycek['category_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="kategoriduzenle" class="btn btn-success">Yenilə</button>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </div>



  <hr>
  <hr>
  <hr>



</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
