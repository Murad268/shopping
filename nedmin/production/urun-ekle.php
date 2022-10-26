<?php 

include 'header.php'; 




?>


<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Məshul Əlavə Etmək <small>

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
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />


            <form action="../netting/islem.php" method="POST" id="menuekleform" data-parsley-validate class="form-horizontal form-label-left">



   


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

               
                    <select class="select2_multiple form-control" required="" name="kategori_id">
                        <?php
                           $kategorilericek = $db->prepare("SELECT * FROM categories");
                           $kategorilericek->execute();
                           $kategoriler = $kategorilericek->fetchAll(PDO::FETCH_ASSOC);
                           $kategorisayi = $kategorilericek->rowCount();
                           $kategoriListi = listing($kategoriler);
                           if($kategorisayi>0) {
                              foreach($kategoriler as $kategori) {?>
                                 <option value="<?=$kategori["category_id"]?>"><?=$kategori["category_ad"]?></option>
                              <?php
                              }
                           }
                        ?>

               

                     </select>
                   </div>
                 </div>


          


                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="urun_ad" placeholder="Məhsul adını daxil edin" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>



                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <textarea  style="height: 100px" class="form-control col-md-7 col-xs-12" id="editor1" placeholder="Məhsulun məzmununu daxil edin" name="urun_detay"></textarea>
                  </div>
                </div>

     


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_fiyat" placeholder="Məhsul qiymətini daxil edin"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Video <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_video" placeholder="Məshul videosunu daxil edin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Keyword <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_keyword" placeholder="Məshul keyword daxil edin" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_stok" placeholder="Məshul stok ədədini daxil edin" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="urun_durum" required>


                  <option value="1" >Aktif</option>
                  <option value="0" >Pasif</option>
                  


                 </select>
               </div>
             </div>

             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="urunekle" class="btn btn-success">Kaydet</button>
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
<script src="../../js/script.js"></script>
<?php include 'footer.php'; ?>
